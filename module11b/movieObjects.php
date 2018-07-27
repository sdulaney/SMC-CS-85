<?php

class Movie
{
    private $age;

    public function __construct($age = 0) {
        $this->age = $age;
    }

    public function get_age() {
        return $this->age;
    }

    public function set_age($age) {
        $this->age = $age;
    }

    public function calculate_ticket_price() {
        $price = 10;                                            // age 18 - 55: full ticket price
        if ($this->age < 5) {                                   // age < 5: free
            $price = 0;                                         
        } elseif (($this->age >= 5) && ($this->age <= 17)) {    // age 5 - 17: half price
            $price /= 2;                                        
        } elseif ($this->age > 55) {                            // age > 55: $2 off
            $price -= 2;                                        
        }
        return $price;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Object Oriented Programming - Simple Movie Class</title>
</head>
<body>
    <strong>Movie, Empty Constructor, Age 0</strong>
    <br>
<?php
    $movie1 = new Movie();
?>
    <p><?php echo "Price: $" . $movie1->calculate_ticket_price(); ?></p>
    <strong>Movie, Parameterized Constructor, Age 15</strong>
    <br>
<?php
    $movie2 = new Movie(15);
?>
    <p><?php echo "Price: $" . $movie2->calculate_ticket_price(); ?></p>
    <strong>Movie, Empty Constructor, Age 30</strong>
    <br>
<?php
    $movie3 = new Movie();
    $movie3->set_age(30);
?>
    <p><?php echo "Price: $" . $movie3->calculate_ticket_price(); ?></p>
    <strong>Movie, Empty Constructor, Age 65</strong>
    <br>
<?php
    $movie4 = new Movie();
    $movie4->set_age(65);
?>
    <p><?php echo "Price: $" . $movie4->calculate_ticket_price(); ?></p>
</body>
</html>