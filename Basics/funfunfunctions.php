
<?php
// Functions are firstclass citizens just like in JS, so you can pass the around like normal variables! woohoo!

$my_function = function ($owner) {
  echo "I am {$owner}'s function!" . "<br>";
};

$my_function("Kareem");


// We can also store function as parameters in objects + arrays!
$my_functions = [
  function () {
    echo "I am the first function in the array!" . "<br>";
  },
  function () {
    echo "I am the second function in the array!" . "<br>";
  },
  function () {
    echo "I am the third function in the array!" . "<br>";
  }
];

foreach ($my_functions as $func) {
  $func();
}


$my_function_obj = (object) [
  "task" => "scream",
  "action" => function () {
    echo "AHH!!!!!!!!!!!!!!!!!!!!!!!!!!!" . "<br>";
  }
];

echo "We are running the function for the {$my_function_obj->task} task" . "<br>";
echo ($my_function_obj->action)();

// We can also just use associative arrays as they are, but it looks less readable
$my_function_obj = [
  "task" => "die",
  "action" => function () {
    echo "I. am. DEAD." . "<br>";
  }
];

echo "We are running the function for the {$my_function_obj["task"]} task" . "<br>";
$my_function_obj["action"]();

// Deeper nested object
$my_big_function_obj = [
  (object) [
    "task" => "scream",
    "action" => function () {
      echo "AHH!!!!!!!!!!!!!!!!!!!!!!!!!!!" . "<br>";
    }
  ],
  (object) [
    "task" => "die",
    "action" => function () {
      echo "I. am. DEAD." . "<br>";
    }
  ]
];

foreach ($my_big_function_obj as $my_function_obj) {
  echo "We are running the function for the {$my_function_obj->task} task" . "<br>";
  echo ($my_function_obj->action)();
}

?>