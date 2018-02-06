<?php
namespace Blockchain;

class Block
{
    /** @var integer */
    private $index;
    /** @var string */
    private $previousHash;
    /** @var integer */
    private $timestamp;
    /** @var mixed */
    private $data;
    /**
     * Block constructor.
     * @param $index
     * @param $previousHash
     * @param $timestamp
     * @param $data
     */
    public function __construct($index, $previousHash, $timestamp, $data)
    {
        $this->index = $index;
        $this->previousHash = $previousHash;
        $this->timestamp = $timestamp;
        $this->data = $data;
    }
    /**
     * @return string
     */
    public function getHash(){
        return hash('sha256', json_encode(get_object_vars($this)));
    }
    /**
     * @return int
     */
    public function getIndex(): int
    {
        return $this->index;
    }
    /**
     * @param int $index
     */
    public function setIndex(int $index)
    {
        $this->index = $index;
    }
    /**
     * @return string
     */
    public function getPreviousHash(): string
    {
        return $this->previousHash;
    }
    /**
     * @param string $previousHash
     */
    public function setPreviousHash(string $previousHash)
    {
        $this->previousHash = $previousHash;
    }
    /**
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }
    /**
     * @param int $timestamp
     */
    public function setTimestamp(int $timestamp)
    {
        $this->timestamp = $timestamp;
    }
    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }
}
