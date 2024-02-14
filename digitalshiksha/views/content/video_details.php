<style>
  .list-unstyled li {
    width: 60%;
  }

  .qusAList ul li {
    margin-bottom: 20px;
    margin-top: 20px;
  }
</style>
<section class="secPad">
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <div class="listUser">
          <h2> Video Details </h2>
          <a href="javascript:history.go(-1)"> <i class="fa fa-angle-left" aria-hidden="true"></i> <span> Go Back To Pervious Page </span></a>
        </div>
      </div>
    </div>


    <span class="pull-right hide">Time Start:
      <span class="video-duration"></span>
    </span>
    <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          <h2 class="h2">Topic List</h2>
        </div>
      </div>

      <!-- <div class="col-md-12 qusAList"> -->
	    <div class="col-md-12">
		<div class="panel panel-default">

        <div class="panel-group" id="accordion">

        <ul class="list-unstyled w-auto">
          <?php $i = 1;
          foreach ($syllabus_questions as $allQuestions) { ?>
            <li>
              <div class="panel-heading qusAnawer">
			  
			  
                <h3>
                  <strong> Que <?= $i ?>. </strong>

                 
                  <a href="javascript:void(0);" onclick="showVideo(<?= $allQuestions->id ?>)" title="Click here to show video"> <?= $allQuestions->question ?></a>

                </h3>
              </div>
            </li>

            <div class="fixImg youtube-video" id="video<?= $allQuestions->id ?>" style="display:none;">
              <iframe width="853" src="https://www.youtube.com/embed/<?= $allQuestions->url ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
            </div>

          <?php $i++;
          } ?>
        </ul>
		</div>
      </div>
	  </div>
    </div>

  </div>
</section>
<style>
.panel-heading.qusAnawer {
    background: #8f8484;
    /* color: black; */
    margin: 10px;
}
</style>