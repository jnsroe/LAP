<?php

if(isset($_POST['search']) || isset($_POST['searchfield']))
{
    try {
        $von = $_POST['von'];
        $bis = $_POST['bis'];
        $query = 'select mov_id as "MovieNr",
              gen_name as "Genre", 
              concat_ws(\' \', mov_title_1, mov_title_2) as "Filmtitel",
              date_format(mov_year, \'%Y\') as "Jahr", 
              concat_ws(\' \', per_fname, per_secName, per_lname) as "Regie" 
              from movie.genre g natural join movie.movie m natural join movie.movie_director md natural join movie.person p 
              where mov_year >= ? and mov_year <= ? 
              order by Genre, Filmtitel, Jahr';
        $stmt = $con->prepare($query);
        $stmt->execute([$von, $bis]);
        $stmtNew = $stmt;
        echo '<div class="table">
          <div class="row">';
        // meta-daten: Attributbezeichnung "auslesen"
        // beginnt bei Attribut 1 nicht 0, da erstes Attribut ein PK ist, der nicht angezeigt wird
        // dieser wird als Vergleich benötigt, um einen Titel mit mehreren Regisseuren nicht anzuzeigen
        for ($i = 1; $i < $stmt->columnCount(); $i++) {
            echo '<div class="col"><label class="font-weight-bold">' . $stmt->getColumnMeta($i)['name'] . '</label></div>';
        }
        echo '</div>'; // row
        $lastID = 0;
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            echo '<div class="row">';
            if ($lastID == $row[0]) {
                echo '<div class="col"></div><div class="col"></div><div class="col"></div><div class="col">und ' . $row[4] . '</div>';
            } else {
                echo '<div class="col">' . $row[1] . '</div><div class="col">' . $row[2] . '</div><div class="col">' . $row[3] . '</div><div class="col">' . $row[4] . '</div><br>';
            }
            $lastID = $row[0];
            echo '</div>';
        }
        echo '</div>'; // table
    } catch(Exception $e)
    {
        echo 'Teil1 '.$e->getCode().': '.$e->getMessage().'<br>';
    }

    /* Lösungsvariante: diese Ergebnistabelle wird in eine "neue" Datenbank dbmovie in die Tabelle tblpremiere gespeichert */
    $querydrop = 'drop database if exists dbmovie';
    $query1 = 'create database dbmovie';
    $query2 = 'use dbmovie';
    $query3 = 'create table dbmovie.tblpremiere (pre_id int, genre varchar(255), 
                filmtitel varchar(255), jahr int, regie varchar(255))';

    $query4 = 'select * from dbmovie.tblpremiere';
    try
    {
        $stmt = $con->prepare($querydrop);
        $stmt->execute();
        $stmt1 = $con->prepare($query1);
        $stmt1->execute();
        $stmt2 = $con->prepare($query2);
        $stmt2->execute();
        $stmt3 = $con->prepare($query3);
        $stmt3->execute();
        $stmtInsertQuery = 'insert into dbmovie.tblpremiere (pre_id, genre, filmtitel, jahr, regie) '.$query;
        $stmtinsertMovie = $con->prepare($stmtInsertQuery);
        $stmtinsertMovie->execute([$von, $bis]);

        echo '<form method="post">';
        echo '<div class="form-group">
        <label style="font-weight: bold">Suche:</label>
        <input type="text" style="width: 25em" name="suchfeld" placeholder="Sie können in jeder Spalte suchen">
        </div>';

        echo '<div class="form-group">
    <label class="col-md-2"></label>
    <input type="hidden" name="von" value="'.$von.'">
    <input type="hidden" name="bis" value="'.$bis.'">
    <input type="submit" style="width: 25em" name="searchfield" value="Suche starten"></div>';
        echo '</form>';

        if(isset($_POST['searchfield']))
        {
            $suchfeld = $_POST['suchfeld'];
            echo '<h2>Ergebnis der Suche</h2>';
            $query6 = 'select Genre, Filmtitel,  Jahr, Regie from tblpremiere where genre like ? or filmtitel like ? or jahr like ? or regie like ?';

            $stmt6 = $con->prepare($query6);
            $suche = '%'.$suchfeld.'%';
            $stmt6->execute([$suche, $suche, $suche, $suche]);
            echo '<div class="table"><div class="row">';
            for($i = 0; $i < $stmt6->columnCount(); $i++)
            {
                echo '<div class="col font-weight-bold">'.$stmt6->getColumnMeta($i)['name'].'</div>';
            }
            echo '</div>
                  <div class="row">';
            while($row = $stmt6->fetch(PDO::FETCH_NUM))
            {
                foreach($row as $r)
                {
                    //echo '<input type="text" id="fname" value="'.$r.'" name="fname"><br>';
                    echo '<div class="col">'.$r.'</div>';
                }
                echo '<br>';
            }
            echo '</div>
                  </div>';
        }
    } catch(Exception $e)
    {
        echo $e->getCode().': '.$e->getMessage();
    }
    /* ************************************************************************************************************** */
} else
{
    $today_date = date('Y-m-d');

?>
    <h3>Suche nach Premiere</h3>
    <form method="post">
        <div class="form-group">
            <div class="row">
                <label class="col-md-2">Zeitraum:</label>
                <input class="form-control col-md-2 justify-content-around justify-content-between" type="date" name="von" min="1900-01-01" required>
              <?php  echo '<input class="form-control col-md-2 justify-content-around justify-content-between" type="date" name="bis" min="1900-01-01" max="'.$today_date.'" required>'; ?> <!-- max todo -->
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-md-2">Zeitraum:</label>
                <input type="submit" name="search" value="suche">
            </div>
        </div>
    </form>
<?php
}