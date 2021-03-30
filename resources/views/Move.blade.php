<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div id="wrap">
    <div id="outer">
        <div id="inner">

        </div>
    </div>
</div>
<script>
    var innerDiv = $('#inner');
    var outerDiv = $('#outer');
    var outDim = outerDiv.offset();
    outDim.right = (outDim.left + outerDiv.width());
    outDim.bottom = (outDim.top + outerDiv.height());
    $(document).on('mousemove', function(e) {


    });
</script>
<style>
    #wrap {
        height: 200px;
        width: 200px;
        border: 2px solid black;
    }

    #outer {
        height: 100px;
        width: 100px;
        border: 2px solid blue;
        margin: 0 auto;
    }

    #inner {
        height: 40px;
        width: 40px;
        border: 2px solid red;
        position: absolute;
    }
</style>