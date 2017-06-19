A simple newsletter email system. The goal is to emulate sending newsletters to subscribers.

There are 3 business entities:

Subscriber - has a name and an email address
<br>List - has a name and is a list of subscribers. Subscribers can subscribe to a list, and there can be many subscribers in a list.
<br>Email - has a subject and a body. Usually emails are sent to subscriber lists. There can be several different types of emails:
<br>Newsletter - can be sent to multiple lists. Newsletters may be sent out immediately or scheduled to be sent at a later time.
<br>Welcome email - they are sent only to new subscribers when they subscribe to specified list(s). One welcome email may send to multiple lists, and one list may have multiple welcome emails.
<br>Notification email - they are sent out to one or multiple lists, sending is triggered by an outside event, e.g. new content is published, and new content is usually displayed within the email (e.g. as a digest of recent articles).
One should be able to create each type of email and send it to two lists with two subscribers each.

Sample output look like this:
Recipient: Jack <jack@example.org>
Subject: Good morning
    
Good morning and have a nice day!
- Jill

Automated tests.
Plain PHP.