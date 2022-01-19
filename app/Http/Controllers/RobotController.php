<?php

namespace App\Http\Controllers;

use App\Classes\RobotClass;
use Illuminate\Http\Request;


class RobotController extends Controller
{
    private $toyRobot;

	public function __construct()
	{
        $this->toyRobot = new RobotClass;
        
        return view('simulatorEnv');
	}

	public function deleteSession(Request $request)
	{
		if($request->session()->has('toyRobotInstance'))
			$request->session()->forget('toyRobotInstance');
	}

	public function pushText(Request $request)
	{
		
		$incomingCommand = $request->command;
		$incomingCommand = strtoupper($incomingCommand);
		if($request->session()->has('toyRobotInstance'))
		{
			$this->toyRobot =  $request->session()->get('toyRobotInstance');

			if(!strcmp(substr($incomingCommand,0,5),'PLACE'))
			{
				$return_text = $this->toyRobot->place(substr($incomingCommand,6,1),substr($incomingCommand,8,1),substr($incomingCommand,10));
				if(!strcmp($return_text ,'1'))
					$return_text = "PLACED ROBOT AT ".substr($incomingCommand,6,1).", ".substr($incomingCommand,8,1).", ".strtoupper(substr($incomingCommand,10));
			}
            elseif(!strcmp($incomingCommand,'MOVE'))
            {
                $return_text = $this->toyRobot->move();
                if($return_text == -1)
                    $return_text = "CAN NOT MOVE FORWARD AS ROBOT WILL FALL";
			}elseif(!strcmp($incomingCommand,'LEFT'))
				$return_text = $this->toyRobot->left();
			elseif(!strcmp($incomingCommand,'RIGHT'))
                $return_text = $this->toyRobot->right();
			else $return_text = "COMMAND NOT FOUND";

			$request->session()->put('toyRobotInstance', $this->toyRobot);
		}
		else
		{
			if(!strcmp(substr($incomingCommand,0,5),'PLACE'))
				{$return_text = $this->toyRobot->place(substr($incomingCommand,6,1),substr($incomingCommand,8,1),substr($incomingCommand,10));
					if(!strcmp($return_text ,'1'))
					{
						$request->session()->put('toyRobotInstance', $this->toyRobot);
						$return_text = "PLACED ROBOT AT ".substr($incomingCommand,6,1).", ".substr($incomingCommand,8,1).", ".strtoupper(substr($incomingCommand,10));
					}
				}
				else
					$return_text = "ERROR FIRST COMMAND SHOULD BE A 'PLACE' COMMAND";
        }
			$request->session()->push('logs', $return_text);
            return back()->with('result', $return_text);
		}

		public function resetSession(Request $request){
			if($request->session()->has('toyRobotInstance')){
				$request->session()->forget('toyRobotInstance');
				$request->session()->flush();
			}

			return back();
		}
}
