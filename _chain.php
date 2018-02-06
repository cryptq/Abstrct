<?php
namespace Blockchain;

class Chain
{
    /**
     * @var Block[]
     */
    private $blocks = [];
    /**
     * @param Block $block
     */
    public function addBlock(Block $block){
        $this->blocks[] = $block;
    }
    /**
     * @param $index
     * @return Block
     */
    public function getBlock($index){
        return $this->blocks[$index];
    }
    /**
     * @return bool
     */
    public function isValid(){
        $previousHash = null;
        $previousIndex = -1;
        /** @var Block $block */
        foreach($this->blocks as $block){
            if($block->getPreviousHash() !== $previousHash || $previousIndex + 1 !== $block->getIndex()){
                return false;
            }
            $previousHash = $block->getHash();
            $previousIndex = $block->getIndex();
        }
        return true;
    }
}
