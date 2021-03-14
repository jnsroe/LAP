<?php

if(isset($_POST['search']) || isset($_POST['searchfield']))
{
    try {
        $von = $_POST['von'];
        $bis = $_POST['bis'];
        $query = 'select * from movie';
        $stmt = $con->prepare($query);
        $stmt->execute();
        $stmtNew = $stmt;
        echo $stmt->rowCount();
        echo '<div class="table">
          <div class="row">';
        // meta-daten: Attributbezeichnung "auslesen"
        // beginnt bei Attribut 1 nicht 0, da erstes Attribut ein PK ist, der nicht angezeigt wird
        // dieser wird als Vergleich benötigt, um einen Titel mit mehreren Regisseuren nicht anzuzeigen
        for ($i = 1; $i < $stmt->columnCount(); $i++) {
            echo '<div class="col"><label class="font-weight-bold">' . $stmt->getColumnMeta($i)['name'] . '</label></div>';
        }
        echo '</div>'; // row
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            echo '<div class="row">';
            for ($i = 1; $i < $stmt->columnCount(); $i++) {
                echo '<div class="col">' . $row[$i]. '</div>';
            }
            echo '<br>';
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

            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <input type="submit" name="search" value="suche">
            </div>
        </div>
    </form>
    <?php
}