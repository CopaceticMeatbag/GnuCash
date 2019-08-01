<?php

/**
 * returns the db connection string from environment vars
 */
function conn_string()
{
  $host = getenv('DB_HOST') ? getenv('DB_HOST') : 'localhost';
  $port = getenv('DB_PORT') ? getenv('DB_PORT') : '5432';
  $dbname = getenv('POSTGRES_DB') ? getenv('POSTGRES_DB') : 'gnucash';
  $user = getenv('POSTGRES_USER') ? getenv('POSTGRES_USER') : 'gnucash';
  $password = getenv('POSTGRES_PASSWORD') ? getenv('POSTGRES_PASSWORD') : 'gnucash';

  return "host=$host port=$port dbname=$dbname user=$user password=$password";
}
