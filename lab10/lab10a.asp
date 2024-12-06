<% 
bgColor = "white"
dim lastVisit, isFirstVisit

queryBgColor = Request.QueryString("background")
If queryBgColor <> "" Then
  bgColor = queryBgColor
End if

cookie = Request.Cookies("lastVisit")
If cookie <> "" Then
  lastVisit = cookie
  isFirstVisit = False
Else
  lastVisit = "First Visit"
  isFirstVisit = True
End if

Response.Cookie("lastVisit") = Now 
Response.Cookie("lastVisit").Expires = Date() + 10
%>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problem 1</title>
</head>
<body style="background-color:<%= bgColor %>;">
    <h1>Welcome to the Dynamic Background Page</h1>
    <p>The background color is set to: <strong><%= bgColor %></strong></p>
    <p>
        <% If isFirstVisit Then %>
            <strong><%= lastVisit %></strong>
        <% Else %>
            Your last visit was on: <strong><%= lastVisit %></strong>
        <% End If %>
    </p>
    <p>Change the background color by adding <strong>?background=</strong>followed by either the color name or the hexcode</p>
    <p>For example: ?background=red or ?background=#FFFFFF</p>
</body>
</html>