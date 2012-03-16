<!-- admin/views/add_flights.php -->

<h2>Ajouter 1 vol</h2>

<form method="POST" action="./?action=add_flights">
    <fieldset>
        <label>Company Name</label>
        <input type="text" name="company_name" />
        <label>Departure date & time</label>
        <input type="text" name="departure_datetime" />
        <label>Arrival date & time</label>
        <input type="text" name="arrival_datetime" />
        <label>Departure airport</label>
        <input type="text" name="departure_airport" />
        <label>Arrival airport</label>
        <input type="text" name="arrival_airport" />
        <label>Rates</label>
        <!-- TODO : vérif format decimal -->
        <input type="text" name="rates" />
        <input type="submit" value="Créer" />
    </fieldset>
</form>