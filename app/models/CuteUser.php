<?php

Class CuteUser {
  /** Properties **/
  private $name; // String of the user's name
  private $dob; // String of the user's date of birth
  private $loc; // String of the user's location

  /** Methods **/

  /**
  * Sets up the new user with a name, DOB, and location.
  **/
  public function setUser() {
    $this->setName();
    $this->setDOB();
    $this->setLoc();
  }
  
  /**
  * Sets the user's name.
  **/
  public function setName() {
    $this->name = $this->randomName();
  }

  /**
  * Simple getter method for the name variable.
  **/
  public function getName() {
    return $this->name;
  }

  /**
  * Sets the user's date of birth.
  **/
  public function setDOB() {
    $this->dob = $this->randomDOB();
  }

  /**
  * Simple getter method for the DOB variable.
  **/
  public function getDOB() {
    return $this->dob;
  }

  /**
  * Sets the user's location.
  **/
  public function setLoc() {
    $this->loc = $this->RandomLocation();
  }

  /**
  * Simple getter method for the user's location.
  **/
  public function getLoc() {
    return $this->loc;
  }

  /**
  * Generates a random silly name for the user.
  **/
  private function randomName() {
    // Create an array of names
    $names = array("Kissy Von Smoocherface", "Cupcakes McGee", "Tom Bombadil",
                    "Samwise Gamgee", "Gaffer Gamgee", "Moopy Boops", "Wubbly Bub",
                    "Princess Bubblegum", "Starchy Donut", "Peppermint Butler",
                     "Nice King", "Puppy Sniffs", "Penelope Penguin", "Woofy Scrufferton",
                     "Cookie Chan", "Chester Barnes", "Baxter Buntz", "Alice Muffet",
                     "Henry Wotton", "Cecily Cardew", "Ernest Bunbury",
                      "Bunny MacDoogle", "Amelia Bedelia", "Charlie Bucket",
                      "Violet Beauregarde", "Matilda Wormwood", "Peter Rabbit",
                      "Bingo Dingo", "Knuckles Tribeard", "Bo Peep", "Butters Stotch",
                      "Butterscotch Pickles", "Tumbly Wumps", "Colonel Cluck",
                      "Lorelai Gilmore", "Hunky McCharming", "Lieutenant Lotsaflowers",
                      "Forest Gump", "Special Agent Dale Cooper", "Pieface Bubtown",
                      "Wanda Manfredjinsinjin", "George Catlin", "Clancy Dancepants",
                      "Gunther", "Eureka Nutt");
    return $names[rand(0, count($names)-1)];
  }
  
  /**
  * Generates a random DOB for the user.
  **/
  private function randomDOB() {
    $month = rand(1,12);
    $year = rand(1900,2000);
    $day = $this->randomDayOfTheMonth($month, $year);

    return $month . "/" . $day . "/" . $year;

  }

  /**
  * Returns a random day of the month, depending on the length of the month.
  **/
  private function randomDayOfTheMonth($month) {
    $day;
    if ($month == 2) {
       $day = rand(1,28);
    }
    else if ($month == 9 || $month == 4 || $month == 6 || $month == 11) {
      $day = rand(1,30);
    }
    else $day = rand(1,31);
    return $day;
  }

  /**
  * Generates a random silly location for the user.
  **/
  private function randomLocation() {
    $locations = array("Seattle", "Walla Walla", "Candy Kingdom", "Teribithia", "Middle-Earth",
                        "San Francisco", "Inside of a giant peach pit", "Boston", "London", 
                        "Berlin", "Paris", "Tokyo", "Calcutta", "Saigon", "Brisbane", "IL",
                        "Austin", "Grenoble", "Dublin", "Alaska", "Ice Kingdom", "New York City",
                        "Bridgewater, Massachusetts", "Los Angeles", "Prince Edward Island", 
                        "Valinor", "Minas Tirith", "The Shire", "New Hampshire", "Toronto",
                        "Stars Hollow, Connecticut", "The Gold Coast, Australia", "Broekel, Germany",
                        "Prague", "Mongolia", "Carver, Massachusetts", "Washington, D.C.",
                        "Iverness, Scotland", "The Land of Oz");
    return $locations[rand(0, count($locations)-1)];
  }
}