# Game of Go

## Technical Test

The theme of this test is the game of go.

The goal is to write a function that determines whether the stone at an x, y position on a goban is taken or not.

## Vocabulary:

- Goban: the board on which stones are placed to play
- Shape: a group of one or more adjacent stones of the same color (adjacent: stones that are left, right, top, bottom of each other, diagonals do not count)
- Freedom: empty space adjacent to a shape

## Reminder of the rules:

- The goban has an indefinite size
- There are two players and everyone plays a stone color: black or white
- The stones are laid one after the other each turn
- When a form has no more freedom it is taken

## Objective

The objective of the test is to write an is_taken function which takes in parameter x, y and which returns true if the stone with the position x, is taken there and false otherwise. To do this function we use a function get_status (x, y) which returns:

- Status.BLACK: when the stone at position x, y is black
- Status.WHITE: when the stone at the x position, y is white
- Status.EMPTY: when there is no stone at position x, y
- Status.OUT: when the position x, y is out of the goban

Write the is_taken with your favorite language. This one must respect the good practices of the chosen language. You will test your solution too.

## How to test it

- Clone the repository
```sh
git clone https://github.com/mrbadguy78/game-of-go.git
```

- Enter the game-of-go directory
```sh
cd game-of-go
```

- Create and start the container in detached mode
```sh
docker-compose up -d
```

- Run composer install
```sh
docker exec -it game-of-go composer install
```
- Run the tests
```sh
docker exec -it game-of-go ./vendor/bin/pest
```
