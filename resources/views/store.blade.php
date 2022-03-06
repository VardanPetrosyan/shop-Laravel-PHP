<script>
    function heading(){
        document.getElementById('head').value = document.getElementById('title').innerHTML;
        document.getElementById('stories').value = document.getElementById('story').innerHTML;
        document.getElementById('authors').value = document.getElementById('author').innerHTML;
        document.getElementById('biogid').value = document.getElementById('biogID').innerHTML;
    }
</script>

<div id="article-container"  title="Text editing is enabled on this page">


    <?php if(empty($article)){ $article = "";}else{ foreach($article as $articles):?>
    <?php  echo  "<div onclick=\"makeEditable(this)\" onblur=\"readOnly(this)\" id='article'>";?>
    <?php echo "<h3 id='title'>"  . $articles['heading'] . "</h3>";?>
    <?php  echo "<p id='story'>" . $articles['story'] . "</p>";?>
    <?php echo "<p id='author' contentEditable=false>Author: " . $_SESSION['name'] . " " . $articles['time'] .  "</p>";?>
    <?php echo "<p id='biogID'>" . $articles['biogID'] . "</p>";?>

    <?php echo "</div>";?>

    <form action=
          '?heading=<?php echo $articles['heading'];?>' method='post' onsubmit="heading();">
        <input type='hidden' id='head' name='head' value=''>
        <input type='hidden' id='stories'  name='stories' value=''>
        <input type='hidden' id='authors' name='authors' value=''>
        <input type='hidden' id='biogid' name='biogid' value=''>

        <input type='submit' name='update' value='Save changes'><br />


    <?php endforeach;}?>

</div>
