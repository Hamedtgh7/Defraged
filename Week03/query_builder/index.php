<?php

require_once __DIR__ . "/vendor/autoload.php";

use query\MySqlDatabase;
use query\MySqlDatabaseConnection;
use query\DatabaseInterface;
use query\DatabaseConnectionInterface;

$connection = MySqlDatabaseConnection::getInstance('localhost', 'record_company', 'root', '');

$query2 = new MySqlDatabase($connection);
$q2 = $query2->table('bands')->select(['name'])->fetchAll();
echo "Names of all bands is:\n";
print_r($q2);
echo "\n";

$query3 = new MySqlDatabase($connection);
$q3 = $query3->table('albums')->select()->order_by('release_year', true)->limit(1)->fetch();
echo "The oldest album is:\n";
print_r($q3);
echo "\n";

$query4 = new MySqlDatabase($connection);
$q4 = $query4->table('bands')->select(['bands.name'])->join('albums', 'bands.id', 'albums.band_id')->fetchAll();
echo "The bands has albums are:\n";
print_r($q4);
echo "\n";

$query5 = new MySqlDatabase($connection);
$q5 = $query5->table('bands')->select(['bands.name'])->join('albums', 'bands.id', 'albums.band_id')->group_by('albums.band_id')->having('COUNT(albums.id) =', 0)->fetchAll();
echo "The bands has no albums are:\n";
print_r($q5);
echo "\n";

$query6 = new MySqlDatabase($connection);
$q6 = $query6->table('albums')->select(['albums.name', 'albums.release_year', 'SUM(songs.length) as Duration'])->join('songs', 'albums.id', 'songs.albums_id')->group_by('songs.albums_id')->order_by('Duration', false)->limit(1)->fetch();
echo "The bands has albums are:\n";
print_r($q6);
echo "\n";

$query7 = new MySqlDatabase($connection);
$q7 = $query7->table('albums')->select(['release_year'])->update(['release_year' => '1986'])->where('release_year', NULL, 'IS')->exec();
echo "The Update is done\n";

$query8 = new MySqlDatabase($connection);
$query8->table('bands')->insert(['name' => 'favourite'])->exec();
$q88 = new MySqlDatabase($connection);
$q = $q88->table('bands')->select(['id'])->where('name', 'favourite')->fetch();
$band_id = $q['id'];
$query8->table('albums')->insert(['name' => 'favourite', 'release_year' => 2022, 'band_id' => $band_id])->exec();
echo "The Favourite added.\n";

$query9 = new MySqlDatabase($connection);
$q = $query9->table('bands')->select(['id'])->where('name', 'favourite')->fetch();
$band_id = $q['id'];
$query9->table('albums')->delete()->where('band_id', $band_id)->exec();
$query9->table('bands')->delete()->where('id', $band_id)->exec();
echo "The delete is done\n";


$query10 = new MySqlDatabase($connection);
$q10 = $query10->table('songs')->select(['AVG(length) as AverageSongDuration'])->fetch();
echo "The Average length of songs is:\n";
print_r($q10);

$query11 = new MySqlDatabase($connection);
$q11 = $query11->table('albums')->select(['albums.name as Album', 'albums.release_year as ReleaseYear', 'MAX(songs.length) as Duration'])->join('songs', 'albums.id', 'songs.albums_id')->group_by('albums.name')->having('Duration IS NOT ', NULL)->fetchAll();
echo "The Longest time of each albums:\n";
print_r($q11);

$query12 = new MySqlDatabase($connection);
$q12 = $query12->table('bands')->select(['bands.name as Bands', 'COUNT(songs.id) as NumberofSongs'])->join('albums', 'bands.id', 'albums.band_id ')->join('songs', 'albums.id', 'songs.albums_id')->group_by('bands.name')->fetchAll();
echo "The number of songs:\n";
print_r($q12);
