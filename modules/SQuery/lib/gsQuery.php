<?php
/*
 *  gsQuery - Querys game servers
 *  Copyright (c) 2002-2004 Jeremias Reith <jr@terragate.net>
 *  http://www.gsquery.org
 *
 *  This file is part of the gsQuery library.
 *
 *  The gsQuery library is free software; you can redistribute it and/or
 *  modify it under the terms of the GNU Lesser General Public
 *  License as published by the Free Software Foundation; either
 *  version 2.1 of the License, or (at your option) any later version.
 *
 *  The gsQuery library is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 *  Lesser General Public License for more details.
 *
 *  You should have received a copy of the GNU Lesser General Public
 *  License along with the gsQuery library; if not, write to the
 *  Free Software Foundation, Inc.,
 *  59 Temple Place, Suite 330, Boston,
 *  MA  02111-1307  USA
 *
 */

/**
 * @mainpage gsQuery
 * @htmlinclude readme.html
 */

/**
 * @example small_example.php
 * This is a simple example of how to use gsQuery
 */

/**
 * @example example_usage.php
 * This is a detailed example of how to use gsQuery
 */

/**
 * @brief Abstract gsQuery base class
 * @author Jeremias Reith (jr@terragate.net)
 * @version $Id: gsQuery.php,v 1.27 2004/05/24 15:22:06 jr Exp $
 *
 * <p>The gsQuery package has one class for each protocol or game.
 * This class is abstract but due to the lack of real OO
 * capabilities it cannot be declared as abstract.
 * Use the static method createInstance to create a gsQuery object
 * that supports the specified protocol.</p>
 *
 * Generic usage:
 * <pre>
 *   // including gsQuery
 *   include_once("path/to/gsQuery/gsQuery.php");
 *
 *   // create a gsQuery instance
 *   $gameserver = gsQuery::createInstance("gameSpy", "myserver.com", 1234)
 *
 *   // query the server
 *   $status = $gameserver->query_server();
 *
 *   // check for success
 *   if($status) {
 *     // process retrieved data
 *   } else {
 *     // create an error message
 *   }
 * </pre>
 */

if ( class_exists('gsquery') )
{
   return;
}

class gsQuery
{

  // public members you can access

  /** @brief The version of the gsQuery package */
  var $version;

  /** @brief The scorelimit of the game */
  var $scorelimit;

  /** @brief The name of team 1 */
  var $team1;

  /** @brief The name of team 2 */
  var $team2;

  /** @brief The # of players on team 1 */
  var $teamcnt1;

  /** @brief The # of players on team 2 */
  var $teamcnt2;

  /** @brief The team 1  score*/
  var $teamscore1;

  /** @brief The team 2  score*/
  var $teamscore2;

  /** @brief The # of players spectating */
  var $spec;

  /** @brief ip or hostname of the server */
  var $address;

  /** @brief port to use for the query */
  var $queryport;

  /**
   * @brief status of the server
   *
   * TRUE: server online, FALSE: server offline
   */
  var $online;

  /** @brief the name of the game */
  var $gamename;

  /** @brief the port you have to connect to enter the game */
  var $hostport;

  /** @brief the version of the game */
  var $gameversion;

  /** @brief The title of the server */
  var $servertitle;

  /** @brief The name of the map (often corresponds with the filename of the map)*/
  var $mapname;

  /** @brief A more descriptive name of the map */
  var $maptitle;

  /** @brief The gametype */
  var $gametype;

  /** @brief current number of players on the server */
  var $numplayers;

  /** @brief maximum number of players allowed on the server */
  var $maxplayers;

  /**
   * @brief Wheather the game server is password protected
   *
   *  1: server is password protected<br>
   *  0: server is not password protected<br>
   * -1: unknown
   */
  var $password;

  /** @brief next map on the server */
  var $nextmap;

  /**
   * @brief players playing on the server
   * @see playerkeys
   *
   * Hash with player ids as key.
   * The containing value will be another hash with the infos of the player.
   * To access a player name use <code>players[$playerid]["name"]</code>.
   * Check playerkeys to get the keys available
   */
  var $players;

  /**
   * @brief Hash of available player infos
   *
   * There is a key for each player info available (e.g. name, score, ping etc).
   * The value is TRUE if the info is available
   */
  var $playerkeys;

  /** @brief list of the team names */
  var $playerteams;

  /** @brief a list of all maps in cycle */
  var $maplist;

  /**
   * @brief Hash with all server rules
   *
   * key:   rulename<br>
   * value: rulevalue
   */
  var $rules;

  /** @brief Short errormessage if something goes wrong */
  var $errstr;

  /**
   * @brief Hash with debug infos
   *
   * Key: What we did / send<br>
   * Value: Result / Error message
   *
   */
  var $debug;

  /**
   * @brief Standard constructor
   *
   * @param address address of the server to query
   * @param queryport the queryport of the server
   */
  function gsQuery($address, $queryport)
  {
    $this->version = ereg_replace("[^0-9\\.]", "", "\$Revision: 1.27 $");

    $this->address = $address;
    $this->queryport = $queryport;

    $this->online = FALSE;
    $this->gamename = "";
    $this->hostport = 0;
    $this->gameversion = "";
    $this->servertitle = "";
    $this->hostport = "";
    $this->mapname = "";
    $this->maptitle = "";
    $this->gametype = "";
    $this->numplayers = 0;
    $this->maxplayers = 0;
    $this->password = -1;
    $this->nextmap="";
	$this->scorelimit =0;
    $this->team1 = "Team 1";
    $this->team2 = "Team 2";
    $this->teamcnt1 = 0;
    $this->teamcnt2 = 0;
    $this->spec = 0;

    $this->players = array();
    $this->playerkeys = array();
    $this->playerteams = array();
    $this->maplist = array();
    $this->rules = array();
    $this->debug = array();

    $this->errstr="";
  }

  /**
   * @brief Creates a new gsQuery object that supports the given protocol
   *
   * This static method will create an instance of the appropriate subclass
   * for you.
   *
   * @param protocol the protocol you need
   * @param address the address of the game server
   * @param port the queryport of the game server
   * @return a gsQuery object that supports the specified protocol
   *
   */
  function createInstance($protocol, $address, $port) {
   global $libpath;
    // including the required class and create an instance of it
    switch($protocol) {
    // some aliases might be useful
    case("armygame"):
      include_once($libpath."armygame.php");
      return new armyGame($address, $port);
	case("gsqp"):
      include_once($libpath."gameSpy.php");
      return new gameSpy($address, $port);
    case("gsqp2"):
      include_once($libpath."gameSpy2.php");
      return new gameSpy2($address, $port);
    case("gsqp3"):
      include_once($libpath."gameSpy3.php");
      return new gameSpy3($address, $port);
	//case "hlife":
      //include_once($libpath."hlife.php");
      //return new hlife($address, $port);
	case "hlife2":
      include_once($libpath."hlife2.php");
      return new hlife2($address, $port);
    case "q3a":
       include_once($libpath."q3a.php");
      return new q3a($address, $port);
     case "ravenshield":
      include_once($libpath."rvnshld.php");
      return new rvnshld($address, $port);
    default:
      // we should be careful when using eval with supplied arguments
      // e.g.: $port="123); system(\"some nasty stuff\")";
      // normally this should be assured by the caller, but we are in reality
      if(ereg("^[A-Za-z0-9_-]+$", $protocol) && ereg("^[A-Za-z0-9\\.-]+$", $address) && is_numeric($port)) {
	include_once($libpath.$protocol.".php");
	return eval("return new $protocol(\"$address\", $port);");
      } else {
	return FALSE;
      }
    }
  }

  /**
   * @brief Creates an instance out of an previously serialized string
   *
   * Use this to restore a object that has been previously serialized with
   * serialize
   *
   * @param string serialized gsQuery object
   * @return the deserialized object
   */
  function unserialize($string)
  {
    // extracting class name
    $string=ltrim($string);
    $length = strlen($string);
    for($i=0;$i<$length;$i++) {
      if($string[$i] == ":") {
	break;
      }
    }

    $className = substr($string, 0, $i);

    // we should be careful when using eval with supplied arguments
    if(ereg("^[A-Za-z0-9_-]+$", $className)) {
      include_once($className .".php");
       return unserialize(base64_decode(substr($string, $i+1)));
     } else {
      return FALSE;
    }
  }

  /**
   * @brief Retrieves a serialized object via HTTP and deserializes it
   *
   * Useful if UDP traffic isnt allowed
   *
   * @param url the URL of the object
   * @return the deserialized object
   */
  function unserializeFromURL($url)
  {
     global $libpath;
    require_once($libpath.'HttpClient.class.php');
    return gsQuery::unserialize(HttpClient::quickGet($url));
  }

  /**
   * @brief Returns all supported protocols / games
   *
   * This method is static.
   * There should be no other php files in the gsQuery directory
   * @todo finding a way to get the path automatically from PHP
   *
   * @param path path to gsQuery root directory
   * @return An array with names of the supported protocols
   */
  function getSupportedProtocols($path)
  {
    if(!$handle=opendir($path)) {
       return FALSE;
    }

    $result=array();

    while(false!==($curfile=readdir($handle))) {
      if($curfile!="gsQuery.php" && $curfile!="index.php" && ereg("^(.*)\.php$", $curfile, $matches)) {
	array_push($result, $matches[1]);
      }
    }
    closedir($handle);
    return $result;
  }


  /**
   * @brief Querys the server
   *
   * This method is abstract
   *
   * @param getPlayers wheather to retrieve player infos
   * @param getRules wheather to retrieve rules
   * @return TRUE on success
   */
  function query_server($getPlayers=TRUE,$getRules=TRUE)
  {
    return FALSE;
  }

  /**
   * @brief Sorts the given players
   *
   * You can sort by name, score, frags, deaths, honor and time
   *
   * @param players players to sort
   * @param sortkey sort by the given key
   * @return sorted player hash
   */
  function sortPlayers($players, $sortkey="name")
  {
    if(!sizeof($players)) {
      return array();
    }
    switch($sortkey) {
    default:
    case "name":
      uasort($players, array("gsQuery", "_sortbyName"));
      break;
    case "score":
      uasort($players, array("gsQuery", "_sortbyScore"));
      break;
    case "frags":
      uasort($players, array("gsQuery", "_sortbyFrags"));
      break;
    case "deaths":
      uasort($players, array("gsQuery", "_sortbyDeaths"));
      break;
    case "honor":
      uasort($players, array("gsQuery", "_sortbyHonor"));
      break;
    case "time":
      uasort($players, array("gsQuery", "_sortbyTime"));
      break;
    }
    return ($players);
  }

  /**
   * @brief htmlizes the given raw string
   *
   * @param string a raw string from the gameserver that might contain special chars
   * @return a html version of the given string
   */
  function htmlize($string)
  {
    return htmlentities($string);
  }

/* this is for game specific cvar displays  */
function docvars($gameserver)
{
}

  /**
   * @brief serializes the object as string
   * @return serialized object representation
   *
   */
  function serialize()
  {
    return $this->_getClassName() .":". base64_encode(serialize($this));
  }

  // private member functions

  // better idea?
  function _sortbyName($a, $b)
  {
    return(strcasecmp($a["name"], $b["name"]));
  }

  function _sortbyScore($a, $b)
  {
    if($a["score"]==$b["score"]) { return 0; }
    elseif($a["score"]<$b["score"]) { return 1; }
    else { return -1; }
  }

  function _sortbyFrags($a, $b)
  {
    if($a["frags"]==$b["frags"]) { return 0; }
    elseif($a["frags"]<$b["frags"]) { return 1; }
    else { return -1; }
  }

  function _sortbyDeaths($a, $b)
  {
    if($a["deaths"]==$b["deaths"]) { return 0; }
    elseif($a["deaths"]<$b["deaths"]) { return 1; }
    else { return -1; }
  }

  function _sortbyTime($a, $b)
  {
    if($a["time"]==$b["time"]) { return 0; }
    elseif($a["time"]<$b["time"]) { return 1; }
    else { return -1; }
  }

  /**
   * @internal @brief sends a command to a server and returns the answer
   *
   * @param address ip or hostname of the server
   * @param port port to connect to
   * @param command data to send
   * @param timeout how long to wait for data (in seconds)
   * @return the raw answser
   *
   */
  function _sendCommand($address, $port, $command, $timeout=500000)
  {
    if(!$socket=@fsockopen("udp://".$address, $port)) {
      $this->debug["While trying to open a socket"]="Couldn't reach server";
      $this->errstr="Cannot open a socket!";
      return FALSE;
    } else {
      socket_set_blocking($socket, true);
      // socket_set_timeout should be used here but this requires PHP >=4.3
      socket_set_timeout($socket, 0, $timeout);

      // send command
      if(fwrite($socket, $command, strlen($command))==-1) {
	fclose($socket);
	$this->debug["While trying to write on a open socket"]="Unable to write on open socket!";
	$this->errstr="Unable to write on open socket!";
	return FALSE;
      }

      $result="";
      do {
	$result .= fread($socket,128);
	$socketstatus = socket_get_status($socket);
      } while ($socketstatus["unread_bytes"]);

      fclose($socket);
      if(!isset($result)) {
	$this->debug["Command send " . $command]="No response from game server received";
	return FALSE;
      }
      $this->debug["Command send " . $command]="Answer received: " .$result;
      return $result;
    }
  }

  /**
   * @brief returns the class name of the instance
   * @return the class name of the instance
   *
   * Override this for mixed case class names and support for PHP <5
   */
  function _getClassName()
  {
    return get_class($this);
  }

  /**
   * @brief Serialization handler
   * @return array of variable names to serialize
   */
  function __sleep()
  {
    // do not serialize debug info to keep the result small
    return array('version',
		 'address',
		 'queryport',
		 'gamename',
		 'hostport',
		 'online',
		 'gameversion',
		 'servertitle',
		 'mapname',
		 'maptitle',
		 'gametype',
		 'numplayers',
		 'maxplayers',
		 'password',
		 'nextmap',
		 'players',
		 'playerkeys',
		 'playerteams',
		 'maplist',
		 'rules',
		 'errstr'
		 );
  }
}
?>

