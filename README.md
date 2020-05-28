# dart-challenge-game

## Technologies

-   Siler Framework
-   MySQL

## Packages

-   Siler
-   DotEnv
-   Eloquent

# How it works ?

## App/Controllers/Leason

function init

-   Where we start. It calls Handle, code and Play.

function handle

-   Verify if code matches, based by true or false and returns notification json.

function code

-   Verify the code [ Null, Empty, Syntax] return 422

## App/Models/Challenge

-   Just to load Eloquent, LMAO

## App/Helpers/game

function play

-   Expect output
-   Check if Challenge exist in database
-   Call intructions

function start

-   create dart file
-   check if runtime output matches with our expect

function runCode

-   run code :D
-   Kill proccess if take more than Challenge timeout
-   Prevent infinite looping
-   return output

function help

-   Return instructions

function runCode

-   run code :D

## App/Helpers/darkside

@TODO

-   Check if it has malicious code, like IO manager.

## App/Helpers/codes [folder]

Code File Storages
