This Toy Robot Simulator is created by Marl Ricanor for fulfilment of the technical exam for Spiralytics. This simple web app is developed using PHP Laravel framework. 

Details:
1. This simulates a robots movement in a 5x5 dimension board.
2. On initial run, the robot is not to be found on the board
3. The user must PLACE the robot on the board making sure that it is within the boards range
4. A robot can move one space at a time per command on the way it is facing
5. The robot may be able to turn left or right
6. The robot may be repositioned to a new location
7. The user is provided a Command text input field to type in any of the available commands and can either be submitted through the Execute button or by simply pressing enter on your keyboard
8. The user is provided with a terminal read only text area to display the results of each command run in the command line
9. The user is provided with a Reset Session button if wanting to reset the entire simulation

Commands available:

PLACE X,Y,F - This will place the robot on the specified X and Y coordinate in the board. F will be the side the robot will be facing. X and Y can be in range from 0-4 (mimics array indexing), while F can be any of the following (NORTH, SOUTH, EAST, WEST)

MOVE - This will simulate the robot to move one index forward depending on the way it is facing

LEFT - This will rotate the facing position of the robot 90 degrees to its left.

RIGHT - This will rotate the facing position of the robot 90 degrees to its right.


HOW TO RUN:

1. Make sure to have atleast PHP 7.3 installed in your machine
2. Have Composer installed
3. From your terminal/command line, go to the projects directory i.e "PATH/robot-interview-marl-ricanor"
4. Run "php artisan serve"