<?php
if ($_SESSION["role"] !== "management") {
    global $domain;
    header('Location: http://' . $domain . '/home');
}
?>

<?php include '../../templates/componant/header.html' ?>
<link rel="stylesheet" href="../../css/calendar.css">
<!DOCTYPE html>
<html>
<head>
    <body>
    <div class="containerCalendar">
        <div class="entete">
            <title>Calendrier de réservation</title>
            <h1>Sélectionnez vos dates de réservation</h1>
        </div>
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