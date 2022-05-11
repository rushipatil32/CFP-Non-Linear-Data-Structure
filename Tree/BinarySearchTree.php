<?php
include 'Node.php';

/**
 * Class to compute Binary Search Tree
 */
class BinarySearchTree{
    protected $root;
    function __construct(){
        $this->root = null;
    }

    /**
     * Function to Insert the node
     * Passing the newNode and its root as parameters
     */
    protected function recursiveInsert(&$new, &$node){
        if ($node == null) {
            $node = $new;
            return;
        }
        if ($new->data <= $node->data) {
            if ($node->left == null) {
                $node->left = $new;
                //$new->parent = $node;
            } else {
                $this->recursiveInsert($new, $node->left);
            }
        } else {
            if ($node->right == null) {
                $node->right = $new;
                //$new->parent = $node;
            } else {
                $this->recursiveInsert($new, $node->right);
            }
        }
    }

    /**
     * Function to search a key
     * Passing the key and the root as parameters
     * Return 1 if found and 0 if not found
     */
    protected function recursiveSearch($target, $node){
        if ($target == $node->data) {
            return 1;
        } else if ($target > $node->data && isset($node->right)) {
            return $this->recursiveSearch($target, $node->right);
        } else if ($target <= $node->data && isset($node->left)) {
            return $this->recursiveSearch($target, $node->left);
        }
        return 0;
    }

    /**
     * Function to traverse the tree
     * Passing the root as the parameter
     * Printing the data of the nodes
     */
    public function recursiveTraverseTree($node){
        if ($node->left != null) {
            $this->recursiveTraverseTree($node->left);
        }
        if ($node->right != null) {
            $this->recursiveTraverseTree($node->right);
        }
        echo $node->data . " ";
    }

    public function insert($node){
        $this->recursiveInsert($node, $this->root);
    }

    public function search($item){
        return $this->recursiveSearch($item, $this->root);
    }

    public function traverse(){
        $this->recursiveTraverseTree($this->root);
    }
}

?>