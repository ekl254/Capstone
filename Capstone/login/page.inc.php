<?php
class Page
{
  // class Page's attributes
  public $content;
  private $title = 'IT360 Applied Database Systems';
  private $keywords = 'IT360 Applied Database Systems, PHP, SQL, Fun, USNA';
  private $xmlheader = "<!DOCTYPE html><html>";

  //constructor
  public function __construct($title) {
    $this->__set("title", $title);
  }

  //set private attributes
  public function __set($varName, $varValue) {
    $varValue = trim($varValue);
    $varValue = strip_tags($varValue);
    if (!get_magic_quotes_gpc()){
      $varValue = addslashes($varValue);
    }
    $this->$varName = $varValue;
  }

  //get function - nothing special for now
  public function __get($varName) {
    return $this->$varName;
  }

  //output the page
  public function display()
  {
    echo $this->xmlheader;
    echo "<head>\n";
    $this -> displayTitle();
    $this -> displayKeywords();
    $this -> displayStyles();
    echo "</head>\n<body>\n";
    $this -> displayContentHeader();
    echo $this->content;
    $this -> displayContentFooter();
    echo "</body>\n</html>\n";
  }

  //output the title
  public function displayTitle() {
    echo '<title> '.$this->title.' </title>';
  }

  public function displayKeywords() {
    echo '<meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta name="description" content="">
          <meta name="author" content="">';
  }

  //display the embedded stylesheet
  public function displayStyles() {
    ?>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <?php
  }



}
?>
