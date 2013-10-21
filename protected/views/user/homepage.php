<div class="hero-unit">
    <h1>This is the test homepage of the user!</h1>

</div>

<?php

$this->widget(
    'bootstrap.widgets.TbCarousel',
    array(
        'items' => array(
            array(
                'image' => 'http://www.placehold.it/1200x400',
                'label' => 'First Thumbnail label',
                'caption' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. '
            ),
            array(
                'image' => 'http://www.placehold.it/1200x400',
                'label' => 'Second Thumbnail label',
                'caption' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. '
            ),
            array(
                'image' => 'http://www.placehold.it/1200x400',
                'label' => 'Third Thumbnail label',
                'caption' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. '
            ),
        ),
    )
);

?>


<p>This is the page that would be shown to the user when he logs in after he as succesfully authentcated.</p>
<p class="text-info">Oh yeah, did I mention that Pretty Print is included as well?</p>
<pre class="prettyprint linenums">

   $this->widget(
       'bootstrap.widgets.TbCarousel',
       array(
           'items' => array(
               array(
                   'image' => 'http://www.placehold.it/1200x400',
                   'label' => 'First Thumbnail label',
                   'caption' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. '
               ),
               array(
                   'image' => 'http://www.placehold.it/1200x400',
                   'label' => 'Second Thumbnail label',
                   'caption' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. '
               ),
               array(
                   'image' => 'http://www.placehold.it/1200x400',
                   'label' => 'Third Thumbnail label',
                   'caption' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. '
               ),
           ),
       )
   );

</pre>