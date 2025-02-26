<?php
$accordions = get_sub_field('accordion');
?>
<section class="content-section content-with-accordion">
<div class="accordion-container container">
    <div class="accordion" id="accordionPage">
        <?php $i = 0; foreach($accordions as $accordion):
            $title = $accordion['title'];
            $description = $accordion['description']; ?>
            <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
                    <h3 class="title"><?php echo $title?></h3>
                </button>
                <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $i; ?>" data-bs-parent="#accordionPage">
                    <div class="accordion-body">
                        <?php echo $description?>
                    </div>
                </div>
            </div>
        <?php $i++; endforeach;?>
    </div>
</section>
