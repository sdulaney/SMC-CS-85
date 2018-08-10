<?php

// Explain class BaseContact
/*
 * BaseContact is an abstract class, so by definition it cannot be instantiated. It has method
 * signatures for two abstract methods (get_name, set_name), which must be defined by any class
 * that inherits from BaseContact. It also has one public property ($phone_number) and one common
 * method (__toString).
 */
abstract class BaseContact
{
    abstract public function get_name();

    abstract public function set_name($name);

    public $phone_number;

    public function __toString() {
        $s = "" . $this->get_name();
        if ($this->phone_number) {
            if (count($s) > 0) {
                $s .= ": ";
            } else {
                $s .= "Someone's Phone Number: ";
            }
            $s .= $this->phone_number;
        }
        return $s;
    }
}

// What is an extends class?
/*
 * An "extends class" is a child class that inherits all of the public and protected methods and properties
 * from a parent class. In this case, PersonContact is the child class and BaseContact is the parent class.
 * The PersonContact class inherits the property $phone_number, the method __toString, as well as defines the
 * implementation for the abstract methods get_name and set_name. In addition to what is inherited from
 * BaseContact, the PersonContact class defines two public properties ($first_name, $last_name) and one
 * constructor (__construct).
 */
class PersonContact extends BaseContact
{
    public $first_name;
    public $last_name;

    public function __construct($first_name = null, $last_name = null) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    public function get_name() {
        return $this->first_name . " " . $this->last_name;
    }

    public function set_name($name) {
        $split_name = explode(" ", $name, 2);
        $length = count($split_name);
        $rv = true;
        if ($length === 0) {
            $rv = false;
        } elseif ($length === 1) {
            $this->first_name = $this->last_name = $split_name[0];
        } else {
            $this->first_name = $split_name[0];
            $this->last_name = $split_name[1];
        }
        return $rv;
    }
}

// What does the get and set methods do?
// What is the __construct() for?
/*
 * The get and set methods (get_name, set_name) are used to retrieve or change the value of the
 * property $name. In order to provide encapsulation, a best practice would be to define the property
 * $name as private so that the methods get_name and set_name are the only way a user can interact with
 * the property. This allows for adding additional complexity at a later time, such as constraints on the value
 * or caching of the value. The __construct method is a constructor method for the OrganizationContact class.
 * It is used to initialize the properties of an object and is automatically called each time a new object
 * is created.
 */
class OrganizationContact extends BaseContact
{
    public $name;

    public function __construct($name = null) {
        $this->name = $name;
    }

    public function get_name() {
        return $this->name;
    }

    public function set_name($name) {
        $this->name = $name;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Object Oriented Programming - Simple Class</title>
</head>
<body>
    <strong>Person Contact, Empty Constructor, Two Names</strong>
    <br>
<?php
    // Example the reserved word "new"
    /*
     * In PHP, the keyword new is used to create an instance of a class.
     */
    $angelo = new PersonContact();
    $angelo->set_name("Angelo Roncalli");
    $angelo->phone_number = "777-777-7777";
?>
    <p><?php print $angelo ?></p>
    <strong>Person Contact, Empty Constructor, Three Names</strong>
    <br>
<?php
    $john = new PersonContact();
    $john->set_name("John Giuseppe Roncalli");
    $john->phone_number = "777-777-7777";
?>
    <p><?php print $john ?></p>
    <strong>Person Contact, Parameterized Constructor</strong>
    <br>
<?php
    $mary = new PersonContact("Mary", "Roncalli");
    $mary->phone_number = "777-777-7777";
?>
    <p><?php print $mary ?></p>
    <strong>Organization Contact, Empty Constructor</strong>
    <br>
<?php
    $parish = new OrganizationContact();
    $parish->set_name("Parish");
    $parish->phone_number = "777-777-7777";
?>
    <p><?php print $parish ?></p>
    <strong>Organization Contact, Parameterized Constructor</strong>
    <br>
<?php
    $parish = new OrganizationContact("Parish");
    $parish->phone_number = "777-777-7777";
?>
    <p><?php print $parish ?></p>
</body>
</html>