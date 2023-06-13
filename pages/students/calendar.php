<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');

    .calendar {
        width: 300px;
        height: 200px;
        background: #fff;
        display: flex;
        align-items: center;
        /* border-radius: 10px; */
        font-family: 'Poppins', sans-serif;
        border-radius: 10px;
        border: 2px solid #000;
    }

    .left,
    .right {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        font-size: 24px;
    }

    .right {
        width: 42%;
        background: #f4351e;
        color: #fff;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .left {
        width: 58%;
    }
</style>
<div class="calendar">
    <div class="left">
        <p><?= date("d") ?></p>
        <p><?= date("l") ?></p>
    </div>
    <div class="right">
        <p><?= date("F") ?></p>
        <p><?= date("Y") ?></p>
    </div>
</div>