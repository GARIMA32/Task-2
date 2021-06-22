<?php
$dbHost     = "localhost"; 
$dbUsername = "root"; 
$dbPassword = ""; 
$dbName     = "dropdb"; 
 
// Create database connection 
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
$query = "SELECT * FROM countries";
$result = $db->query($query);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<select id="country">
    <option value="">Select Country</option>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['country_id'] . '">' . $row['country_name'] . '</option>';
        }
    } else {
        echo '<option value="">Sorry brother no country</option>';
    }
    ?>
</select>

<select id="state">
    <option value="">Select country first</option>
</select>

<select id="city">
    <option value="">Select state first</option>
</select>
<button type="submit">Submit</button>

<script>
    $(document).ready(function() {
        $('#country').on('change', function() {
            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax.php',
                    data: 'country_id=' + countryID,
                    
                    success: function(html) {
                        $('#state').html(html);
                        $('#city').html('<option value="">Select state first</option>');
                    }
                });
                console.log('country_id=' + countryID);
            } else {
                $('#state').html('<option value="">Select country first</option>');
                $('#city').html('<option value="">Select state first</option>');
            }
        });

        $('#state').on('change', function() {
            var stateID = $(this).val();
            if (stateID) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax.php',
                    data: 'state_id=' + stateID,
                    success: function(html) {
                        $('#city').html(html);
                    }
                });
            } else {
                $('#city').html('<option value="">Select state first</option>');
            }
        });
    });
</script>