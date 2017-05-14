@extends('layout')


@section('content')



<div>
	<div class="row">
		<div class="col-sm-6">
			<h3>Submit a request</h3>

			

			  <div class="form-group">
			    <label for="">Your email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
			  </div>

			  <div class="form-group">
			    <label for="">Please tell us what your enquiry to</label>
			    <select class="form-control" id="message_type">
			    	<option value="Feedback" >Feedback</option>
			    	<option value="Enquiry">Enquiry</option>
			    	<option value="Complaint">Complaint</option>
			    </select>
			  </div>

			  <div class="form-group">
			    <label for="">How can we help</label>
			    <textarea class="form-control" rows="3" id="email_message" ></textarea>
			  </div>
			  
			  <button type="submit" class="btn btn-default" onclick="onClickSend()">Submit</button>
			


			<hr class="visible-xs">
		</div>

		<div class="col-sm-6">
			<h3>Contact us</h3>

			<p>Reception: +61 0000 00000</p>

			<h4>Call Center Hours</h4>

			<p>
				Mon - Fri: 8am to 5:30pm AEDT
			</p>

			<p>
				Sat - Sun: 9am to 5:30pm AEDT
			</p>

			<h4>Location</h4>

			<p>
				124 La Trobe Street, Melbourne, Victoria, 3000
			</p>
		</div>
	</div>
</div>



<script>
	function onClickSend(){
		var service_id = 'outlook';
		var template_id = 'template1';
		var template_params = {
			name: 'JobSeeking',
			reply_email: $('#exampleInputEmail1').val(),
			message:   $('#message_type').val() + " : " + $('#email_message').val()
		};

		emailjs.send(service_id,template_id,template_params);
		alert("Email Sent");
	}


    function check_login_callback(is_login){
        if(is_login){
       
        }else{
          
        }
    } 


</script>


@endsection