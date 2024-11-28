#!/usr/bin/perl -wT
use CGI':standard';
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);
use File::Basename;

my $first = param('first');
my $last = param('last');
my $street = param('street');
my $city = param('city');
my $postal = param('postal');
my $province = param('province');
my $phone = param('phone');
my $email = param('email');


my $safe_filename_characters = "a-zA-Z0-9_.-";
my $upload_dir = "/home/jbphilip/public_html/lab07";

my $photo = param('photo');

if ($photo) {
  my ( $name, $path, $extension ) = fileparse($photo, '\..*');
  $photo = $name . $extension;
  $photo =~ tr/ /_/;
  $photo =~ s/[^$safe_filename_characters]//g;

  my $upload_filehandle = upload("photo");

  if ( defined $upload_filehandle ) {
      open(my $uploadfile, ">", "$upload_dir/$photo") or die "Cannot open file for writing: $!";
      binmode $uploadfile;

      while ( my $chunk = <$upload_filehandle> ) {
          print $uploadfile $chunk;
      }

      close($uploadfile);

      print "<p>File uploaded successfully: $photo</p>";

  } else {
      # Error message for undefined file handle
      print "<p>Failed to upload file. Please try again.</p>";
  }
}

my $phone_regex = qr/^\d{10}$/;
my $postal_regex = qr/^[A-Za-z]\d[A-Za-z] \d[A-Za-z]\d$/;
my $email_regex = qr/^[^@]+@[^@]+\.[^@]+$/;

my @errors;

unless ($phone =~ $phone_regex) {
  push (@errors, "Phone number is formatted incorrectly. Please ensure that it contains only 10 digits");
}

unless ($postal =~ $postal_regex) {
  push (@errors, "Postal code is formatted incorrectly. Please ensure that it follows the format of L0L 0L0 where L is any letter and 0 is any digit.");
}

unless ($email =~ $email_regex) {
  push (@errors, "Email is formatted incorrectly. Please ensure you have an @ and . in the email in the correct positions.");
}
  
  print "Content-type: text/html\n\n";

if (@errors) {
  print <<"HTML";
  <div style="font-family: 'Courier New', Courier, monospace; display: flex; flex-direction: column; justify-content: center; place-items: center; padding: 20rem;">
    <h2 style="color:red;">Unfortunately, there were some errors when trying to register you.</h2>
    <h4 style="font-weight: 100;">Please <span style="font-weight: bold; color: red;"> read the errors below </span>and <span style="font-weight: bold; color: green;">click on the link</span> to be redirected to the form so
      that you can enter your personal information in the correct format</h4>
HTML
    foreach $error (@errors) {
    print <<"HTML";
    <p style="color: red;">$error</p>
HTML
    }
    print <<"HTML";
    <a href="../lab07/lab07b.html" style="font-weight: bold;">Back to Submission Form</a>
  </div>
HTML
} else {
  print <<"HTML";
  <div
    style="font-family: 'Courier New', Courier, monospace; display: flex; flex-direction: column; justify-content: center; place-items: center; padding: 20rem;">
    <p style="color: green; font-weight: bold;">Welcome, $first $last .Thank you for registering to be a customer.</p>
    <p style="font-weight: bold;">Phone: <span style="font-weight: 100;">$phone</span></p>
    <p style="font-weight: bold;">Email: <span style="font-weight: 100;">$email</span></p>
HTML
if ($photo) {
    print <<"HTML";
    <p style='font-weight: bold;'>Photo: <span style='font-weight: 100;'>$photo</span></p>
    <img src="$upload_dir/$photo"></img>
HTML
}
    print <<"HTML";
    <p style="font-weight: bold;">Address: <span style="font-weight: 100;">$street, $city, $postal, $province</span></p>
  </div>
HTML
}