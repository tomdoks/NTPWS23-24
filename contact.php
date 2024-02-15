<?php
  print '
  <h1>Contact Form</h1>
  <div id="contact">
  <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Hektorovi%C4%87eva%20ul.%202,%2010000,%20Zagreb+(SAP%20d.o.o.)&amp;t=p&amp;z=18&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/">gps tracker sport</a></iframe>
    <form action="process_contact.php" id="contact_form" name="contact_form" method="POST"> <label for="fname">First Name *</label>
      <input type="text" id="fname" name="firstname" placeholder="Your name.." required>

      <label for="lname">Last Name *</label>
      <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>

      <label for="lname">Your E-mail *</label>
      <input type="email" id="email" name="email" placeholder="Your e-mail.." required>

      <label for="country">Country</label>
      <select id="country" name="country">
        <option value="">Please select</option>
        <option value="DE">Germany</option>
        <option value="HR" selected>Croatia</option>
        <option value="SL">Slovenia</option>
        <option value="HU">Hungary</option>
      </select>

      <label for="subject">Subject</label>
      <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

      <input type="submit" value="Submit">
    </form>
  </div>';
?>