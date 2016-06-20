<!DOCTYPE html>
<html>
  <head>
    <title>Notifications Quickstart </title>
    <style>
      * { font-family: Helvetica; }
      table { border-collapse:collapse; }
      th {
        margin:0;
        border: 1px solid #ccc;
        background-color: #eee;
        text-align:left;
        padding:5px;
      }
      td {
        margin:0;
        border: 1px solid #ccc;
        padding:5px;
      }
      .unset { color: red; font-weight: bold; }
      .good { color: green; font-weight: bold; }
    </style>
  </head>
  <body>
    <h1>Notifications Environment Setup</h1>
    <p>The following system environment variables should be set:</p>
    <table>
      <tr>
        <th>TWILIO_NOTIFICATION_SERVICE_SID</th>
        <?php  
        if ($TWILIO_NOTIFICATION_SERVICE_SID != '') {
            echo "<td class='good'>$TWILIO_NOTIFICATION_SERVICE_SID</td>";
        } else {
             echo "<td class='unset'>Not Configured</td>";
        }
        ?>
      </tr>
      <tr>  
        <th>TWILIO_APN_CREDENTIAL_SID</th>
        <?php  
        if ($TWILIO_APN_CREDENTIAL_SID != '') {
            echo "<td class='good'>$TWILIO_APN_CREDENTIAL_SID</td>";
        } else {
             echo "<td class='unset'>Not Configured</td>";
        }
        ?>
     </tr>
      <tr>   
        <th>TWILIO_GCM_CREDENTIAL_SID</th>
        <?php  
        if ($TWILIO_GCM_CREDENTIAL_SID != '') {
            echo "<td class='good'>$TWILIO_GCM_CREDENTIAL_SID</td>";
        } else {
             echo "<td class='unset'>Not Configured</td>";
        }
        ?>
      </tr>
      <tr>  
        <th>TWILIO_ACCOUNT_SID</th>
        <?php  
        if ($TWILIO_ACCOUNT_SID != '') {
            echo "<td class='good'>$TWILIO_ACCOUNT_SID</td>";
        } else {
             echo "<td class='unset'>Not Configured</td>";
        }
        ?>
      </tr>
      <tr>  
        <th>TWILIO_AUTH_TOKEN</th>
        <?php  
        if ($TWILIO_AUTH_TOKEN != '') {
            echo "<td class='good'>Secret token configured</td>";
        } else {
             echo "<td class='unset'>Not Configured</td>";
        }
        ?>
      </tr>
    </table>
  </body>
</html>
