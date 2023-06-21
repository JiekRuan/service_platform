<?php include '../../templates/component/header.html' ?>
<link rel="stylesheet" href="../../css/calendar.css">
<!DOCTYPE html>
<html>
<head>
    <div class="containerCalendar">
        <title>Calendrier de réservation</title>
        <body>
            <h1>Sélectionnez une date de réservation</h1>
            
            <div id="calendar">
                <div id="calendar-header">
                    <button id="prevButton">&lt;</button>
                    <h2 id="monthYear"></h2>
                    <button id="nextButton">&gt;</button>
                </div>
                <div id="calendar-grid"></div>
            </div>
            
            <button class="goldenButton">Réserver</button>
        </div>
  
    <script src="../../js/calendar.js"></script>
</body>

</html>