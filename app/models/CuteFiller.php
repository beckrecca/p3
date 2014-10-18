<?php

Class CuteFiller {
  /** Properties **/
  private $text; // String

  /** Methods **/

  /**
  * This method sets the text variable equal to a string of paragraphs, depending on
  * how many paragraphs the user has determined. So the program doesn't blow up, we don't
  * want to create any more than 10 paragraphs.
  **/
  public function setText($p) {
    // Keep anyone from messing with this
    if ($p > 10) {
      $p = 10;
    }

    // Initialize a string for the text we're gonna build.
    $t = "";

    // Build p number of paragraphs.
    for ($i = 0; $i < $p; $i++) {
      $t .= $this->paragraph();
    }

    // Set this class's text variable equal to our t string.
    $this->text = $t;
  }

  /**
  * Simple getter method for the text variable.
  **/
  public function getText() {
    return $this->text;
  }

  /**
  * This method randomly builds an entire paragraph of silly sentences.
  * A paragraph is anywhere from 5 to 20 sentences long. It places the 
  * paragraph between <p></p> tags and returns it as a string.
  **/
  private function paragraph() {
    // Initialize paragraph string.
    $pg = "";

    // Pick a random number of sentences.
    $n = rand(5,20);

    // Generate n sentences.
    for ($i = 0; $i < $n; $i++) {
      $pg .= $this->cuteSentence();
    }

    // Wrap in <p> </p> tags.
    $pg = '<p>' . $pg . '</p>';
    return $pg;
  }

  /**
  * This method randomly builds a cute, silly, and likely nonsensical sentence,
  * and returns it in a string.
  *
  * Kinds of Sentences:
  ** Determiner phrase + intransitive verb
  ** Determiner phrase + transitive verb + determiner phrase
  ** Determiner phrase + intransitive verb + adverb
  ** Determiner phrase + transitive verb + determiner phrase + adverb
  ** Determiner phrase + intransitive verb + prepositional phrase
  ** Determiner phrase + transitive verb + determiner phrase + prepositional phrase
  ** Determiner phrase + intransitive verb + adverb + prepositional phrase
  ** Determiner phrase + transitive verb + determiner phrase + adverb + prepositional phrase
  *
  * Note: a determiner phrase is a fancy linguistics term for a noun phrase.
  **/
  public function cuteSentence() {

    // the array of cute words we'll be working with
    $cutewords = array("DPs" => array 
                            ("the sheep", "the kitty", "a little frog", "seven hamsters", 
                              "a happy bird", "the big dog", "a meatball", "one million puppies", 
                              "the enormous shoe", "panda bears", "the baby fox", "a juicy hamburger", 
                              "the lollipop princess", "a bunch of raspberries", "the muffin man", 
                              "two best friends", "a squirrel", "my little brother's pet cactus", 
                              "the best sandwich ever", "a puggle", "a shooting star", 
                              "the tiniest mouse", "my mittens", "your favorite hat",
                              "all the rabbits", "sentient pancakes", "three goldfish", 
                              "some buried treasure", "your favorite snack", "free stuff",
                              "the lazy egg yolk"),
                       "IV" => array 
                            ("jumps", "twitch", "yawns", "burp", "squeaked", "beep", "sit", "dreams", 
                              "thought", "hope", "play", "rolls", "danced", "twirled", "sings", 
                              "stretches", "ran away", "dozes", "napped", "baked", "smell"),
                       "TV" => array
                            ("liked", "hugs", "snuggles", "greet", "saw", "painted", "thank", "found", 
                              "admires", "teach", "imitate", "befriended", "sniffs"),
                       "adv" => array
                            ("quickly", "slowly", "cheerfully", "patiently", "dreamily", "jovially", 
                              "lazily", "smoothly", "wonderfully", "adorably", "creatively", 
                              "peacefully", "quietly", "swiftly", "often", "rarely", "sometimes",
                              "never", "impossibly"),
                       "prep" => array
                            ("under the tree", "after breakfast", "with love", "in the garden", 
                              "on the way to school", "before bedtime", "on top of the spaghetti", 
                              "down the hill", "up the mountain", "in a cozy nest", 
                              "inside the cottage", "into the river", "through the brilliant sky",
                              "on Halloween", "along the road", "above the roses")
                       );

    // Initialize our silly sentence!
    $sentence = "";
  
    // Generate a Determiner Phrase 
    $randomDP = $cutewords["DPs"][rand(0, count($cutewords["DPs"]) - 1)];
      
    // Build a simple sentence, transitive or intransitive
    $r = rand(0,1);
    // Intransitive (no object)
    if ($r) {
      $randomV = $cutewords["IV"][rand(0, count($cutewords["IV"]) - 1)];
        
      $sentence = $randomDP . " " . $randomV;
    }
    // Transitive (there is an object)
    else {
      $randomV = $cutewords["TV"][rand(0, count($cutewords["TV"]) - 1)];
      $sentence = $randomDP . " " . $randomV;
      $randomDP = $cutewords["DPs"][rand(0, count($cutewords["DPs"]) - 1)];
      $sentence .= " " . $randomDP;
    }
    
    // Add an adverb or not
    $r = rand(0,1);
    if ($r) {
        $randomAdv = $cutewords["adv"][rand(0, count($cutewords["adv"]) - 1)];
        $sentence .= " " . $randomAdv;
    }

    // Add a prepositional phrase or not
    $r = rand (0,1);
    if ($r) {
      $randomPrep = $cutewords["prep"][rand(0, count($cutewords["prep"]) - 1)];
      $sentence .= " " . $randomPrep;
    }
      
    $sentence .= ". ";                   
    $sentence = ucfirst($sentence);
    return $sentence;
  }
}