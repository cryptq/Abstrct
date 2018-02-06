/**
 * Hash Table
 *
 * An associative array, that can map keys
 * (strings and numbers) to values in O(1).
 *
 * @example
 * var hash = require('path-to-algorithms/src/data-structures'+
 * '/hash-table');
 * var hashTable = new hash.Hashtable();
 *
 * hashTable.put(10, 'value');
 * hashTable.put('key', 10);
 *
 * console.log(hashTable.get(10)); // 'value'
 * console.log(hashTable.get('key')); // 10
 *
 * hashTable.remove(10);
 * hashTable.remove('key');
 *
 * console.log(hashTable.get(10)); // undefined
 * console.log(hashTable.get('key')); // undefined
 *
 * @module data-structures/hash-table
*/
(function (exports) {
  'use strict';

  /**
   * Constructs a Node to store data and next/prev nodes in Hash table.
   *
   * @public
   * @constructor
   * @param {Number|String} key Key of the node.
   * @param {Number|String} data Data to be stored in hash table.
   */
  exports.Node = function (key, data) {
    this.key = key;
    this.data = data;
    this.next = undefined;
    this.prev = undefined;
  };

  /**
   * Construct a Hash table..
   *
   * @public
   * @constructor
   */
  exports.Hashtable = function () {
    this.buckets = [];
    // The higher the bucket count; less likely for collisions.
    this.maxBucketCount = 100;
  };

  /**
   * Simple non-crypto hash used to hash keys, which determines
   * while bucket the value will be placed in.
   * A javascript implementation of Java's 32bitint hash.
   *
   * @public
   * @method
   * @param {Number|String} val Key to be hashed.
   */
  exports.Hashtable.prototype.hashCode = function (val) {
    var i;
    var hashCode = 0;
    var character;

    // If value to be hashed is already an integer, return it.
    if (val.length === 0 || val.length === undefined) {
      return val;
    }

    for (i = 0; i < val.length; i += 1) {
      character = val.charCodeAt(i);
      /*jshint -W016 */
      hashCode = ((hashCode << 5) - hashCode) + character;
      hashCode = hashCode & hashCode;
      /*jshint -W016 */
    }

    return hashCode;
  };
  //////////////////////////////////////////////////////////////////////////
  
  
  /////////////////////////////////////////////////////////////////////////
  
  /**
   * Puts data into the table based on hashed key value.
   *
   * @public
   * @method
   * @param {Number|String} key Key for data.
   * @param {Number|String} data Data to be stored in table.
   */
  exports.Hashtable.prototype.put = function (key, data, hashCode) {
    /*
      Make collision testing easy with optional hashCode parameter.
      That should not be used! Only by spec/tests.
    */
    if (hashCode === undefined) {
      // Typical use
      hashCode = this.hashCode(key);
    } else if (hashCode.length > 0) {
      // Testing/Spec - String hash passed, convert to int based hash.
      hashCode = this.hashCode(hashCode);
    }
    // Adjust hash to fit within buckets.
    hashCode = hashCode % this.maxBucketCount;

    var newNode = new exports.Node(key, data);

    // No element exists at hash/index for given key -> put in table.
    if (this.buckets[hashCode] === undefined) {
      this.buckets[hashCode] = newNode;
      return;
    }

    // Element exists at hash/index for given key, but, same key -> overwrite.
    if (this.buckets[hashCode].key === key) {
      this.buckets[hashCode].data = data;
      return;
    }

    /*
      Item exists at hash/index for key, but different key.
      Handle collision.
    */
    var first = this.buckets[hashCode];
    while (first.next !== undefined) {
      first = first.next;
    }
    first.next = newNode;
    newNode.prev = first;
  };
  ////////////////////////////////////////////////////////
  
