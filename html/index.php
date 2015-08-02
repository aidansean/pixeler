<?php
$title = 'Pixeler' ;
$stylesheets = array('style.css') ;
$js_scripts  = array('functions.js') ;
include($_SERVER['FILE_PREFIX'] . '/_core/preamble.php') ;
?>
  <div class="right">
    <h3>Pixeler</h3>
    <div class="blurb">
      <p>This page takes an image and pixelates it.  Here's a sample:</p>
      <table class="images">
        <tbody>
          <tr>
            <th class="images">Before</th>
            <th class="images">After</th>
          </tr>
          <tr>
            <td class="images"><img src="monalisa_before.png" width="" height="" alt="Mona Lisa before pixelation" title="Mona Lisa before pixelation" /></td>
            <td class="images"><img src="monalisa_after.png"  width="" height="" alt="Mona Lisa after pixelation"  title="Mona Lisa after pixelation"  /></td>
          </tr>
        </tbody>
      </table>
    </div>
    <h3>Make your own image!</h3>
    <div class="blurb">
      <p>This can take a few seconds...</p>
      <table id="table_form">
        <tbody>
          <tr>
            <th class="left">Image url: </th>
            <td class="right"><input id="input_uri" type="text" name="url" value="monalisa_before.png" /></td>
          </tr>
          <tr>
            <th class="left">Sampling size: </th>
            <td class="right"><input id="input_pixels" type="text" name="pixels" value="10"/>px</td>
          </tr>
          <tr>
            <th class="left">Output width: </th>
            <td class="right"><input id="input_width" type="text" name="width" value="-1"/>px<br />(-1 for the same as original)</td>
          </tr>
          <tr>
            <th></th>
            <td class="right"><input type="submit" onclick="reload_image()" value="Pixelate" /></td>
          </tr>
        </tbody>
      </table>
      <div id="image_wrapper"><img id="img_pixelated" src="monalisa_after.png" /></div>
    </div>
  </div>
 
<?php foot() ; ?>