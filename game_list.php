<?php

$gamepix_url = file_get_contents("https://games.gamepix.com/games?sid=98R78&order=q"); //get url 
$get_game = json_decode($gamepix_url, true); //decode json url

?>
  
    <div class="main">
      <div class="section section-basic" id="basic-elements">
        <div class="container">
              <table class="table table-responsive" id="games"> //creating table
                <thead>
                  <tr>
                    <th scope="col">Icon</th>
                    <th scope="col">Title</th>
                    <th scope="col">Embed Code</th>
                    <th scope="col">Category</th>
                    <th scope="col">Orientation</th>
                    <th scope="col">url</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach(array_slice($get_game['data']) as $result): ?>    //foreach array
                  <tr>
                    <td><img src="<?= $result['thumbnailUrl100']; ?>" width="50" alt="<?= $result['title']; ?>"/></td>
                    <td><b><?= $result['title']; ?></b></td>
                    <td><textarea cols="50" rows="4" readonly><iframe src="<?php echo $result['url']; ?>" height="<?= $result['height']; ?>" width="<?= $result['width']; ?>" frameborder="0" scrolling="no"></iframe></textarea></td>
                    <td><?= $result['category']; ?></td>
                    <td><?= $result['orientation']; ?></td>
                    <td><a class="btn btn-primary" href="<?php echo urlencode($result['url']); ?>">Play Game</a></td>
                  </tr>
                <?php endforeach; ?>  
                </tbody>
              </table>
        </div>
      </div>

    </div>
