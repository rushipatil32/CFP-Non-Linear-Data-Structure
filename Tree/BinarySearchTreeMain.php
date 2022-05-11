<?php

include "BinarySearchTree.php";

class BinarySearchTreeMain{
    function main(){
        // Add Data in Nodes
$node1 = new Node(56);
$node2 = new Node(30);
$node3 = new Node(22);
$node4 = new Node(40);
$node5 = new Node(11);
$node6 = new Node(3);
$node7 = new Node(16);
$node8 = new Node(70);
$node9 = new Node(60);
$node10 = new Node(95);
$node11 = new Node(65);
$node12 = new Node(63);
$node13 = new Node(67);

$binarySearchTree = new BinarySearchTree();
$binarySearchTree->insert($node1);
$binarySearchTree->insert($node2);
$binarySearchTree->insert($node3);
$binarySearchTree->insert($node4);
$binarySearchTree->insert($node5);
$binarySearchTree->insert($node6);
$binarySearchTree->insert($node7);
$binarySearchTree->insert($node8);
$binarySearchTree->insert($node9);
$binarySearchTree->insert($node10);
$binarySearchTree->insert($node11);
$binarySearchTree->insert($node12);
$binarySearchTree->insert($node13);
$binarySearchTree->traverse();

$check = $binarySearchTree->search(67);
//echo $check;
if ($check == 1) {
    echo "\nSearch Data is Found in the Tree";
} else {
    echo "\nSearch Data is Not Found in the Tree";
}
    }
}
$main = New BinarySearchTreeMain();
$main->main();
?>