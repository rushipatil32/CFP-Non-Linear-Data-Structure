<?php

class Graph{
    
  protected $graph;
  protected $visited = array();

  public function __construct($graph) {
    $this->graph = $graph;
  }


  public function breadthFirstSearch($origin, $destination) {
    foreach ($this->graph as $vertex => $adj) {
      $this->visited[$vertex] = false;
    }
    $q = new SplQueue();

    $q->enqueue($origin);
    $this->visited[$origin] = true;

    $path = array();
    $path[$origin] = new SplDoublyLinkedList();
    $path[$origin]->setIteratorMode(
      SplDoublyLinkedList::IT_MODE_FIFO|SplDoublyLinkedList::IT_MODE_KEEP
    );

    $path[$origin]->push($origin);

    $found = false;
    while (!$q->isEmpty() && $q->bottom() != $destination) {
      $t = $q->dequeue();

      if (!empty($this->graph[$t])) {
        foreach ($this->graph[$t] as $vertex) {
          if (!$this->visited[$vertex]) {

            $q->enqueue($vertex);
            $this->visited[$vertex] = true;

            $path[$vertex] = clone $path[$t];
            $path[$vertex]->push($vertex);
          }
        }
      }
    }

    if (isset($path[$destination])) {
      echo "$origin to $destination in ", 
        count($path[$destination]) - 1,
        " hops\n";
      $sep = '';
      foreach ($path[$destination] as $vertex) {
        echo $sep, $vertex;
        $sep = '->';
      }
      echo "\n";
    }
    else {
      echo "No route from $origin to $destination\n";
    }
  }
}

$graph = array(
        'A' => array('B', 'F'),
        'B' => array('A', 'D', 'E'),
        'C' => array('F'),
        'D' => array('B', 'E'),
        'E' => array('B', 'D', 'F'),
        'F' => array('A', 'E', 'C'),
    );
$graph = new Graph($graph);

$graph->breadthFirstSearch('D', 'C');
$graph->breadthFirstSearch('B', 'F');
$graph->breadthFirstSearch('A', 'C');
$graph->breadthFirstSearch('A', 'G');

?>