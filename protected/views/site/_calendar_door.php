<h1>Hello world</h1>
<form id="form-set-datapick" method="POST" action="/userAdmin/admin/SetDatapick">
    <div>
        <input name="Datapick[datapick]" type="text" value="<?php echo $datapick->datapick ?>"/>
    </div>
    <div>
        <input name="Datapick[year]" type="text" value="<?php echo $datapick->year ?>"/>
    </div>
    <div>
        <input name="Datapick[day]" type="text" value="<?php echo $datapick->day ?>"/>
    </div>
    <div>
        <input name="Datapick[month]" type="text" value="<?php echo $datapick->month ?>"/>
    </div>

    <input id="set-datapick" type="submit" value="submit" onclick="sender($(this));return false;"/>
</form>