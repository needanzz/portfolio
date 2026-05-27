<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Inbound Message</title>
    <style>
        body {
            font-family: 'Inter', Helvetica, Arial, sans-serif;
            background-color: #f4f6fb;
            color: #1a1a2e;
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 600px;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 40px;
            margin: 0 auto;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border-top: 5px solid #263F93;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h2 {
            color: #263F93;
            margin: 0 0 10px 0;
            font-size: 24px;
        }
        .header p {
            color: #6c757d;
            margin: 0;
            font-size: 14px;
        }
        .detail-item {
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #dee2e6;
        }
        .detail-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .detail-label {
            font-size: 12px;
            color: #6c757d;
            text-transform: uppercase;
            font-weight: 600;
            margin-bottom: 5px;
            letter-spacing: 0.5px;
        }
        .detail-value {
            font-size: 16px;
            color: #1a1a2e;
            line-height: 1.5;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 12px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Inbound Inquiry</h2>
            <p>You have received a new contact message from your portfolio website.</p>
        </div>

        <div class="detail-item">
            <div class="detail-label">Sender Name</div>
            <div class="detail-value">{{ $contactMessage->name }}</div>
        </div>

        <div class="detail-item">
            <div class="detail-label">Sender Email</div>
            <div class="detail-value">
                <a href="mailto:{{ $contactMessage->email }}" style="color: #263F93; text-decoration: none;">
                    {{ $contactMessage->email }}
                </a>
            </div>
        </div>

        <div class="detail-item">
            <div class="detail-label">Subject</div>
            <div class="detail-value"><strong>{{ $contactMessage->subject }}</strong></div>
        </div>

        <div class="detail-item">
            <div class="detail-label">Message Content</div>
            <div class="detail-value" style="white-space: pre-wrap;">{{ $contactMessage->message }}</div>
        </div>

        <div class="footer">
            Sent automatically by your portfolio system. <br>
            &copy; {{ date('Y') }} IS-Portfolio. All rights reserved.
        </div>
    </div>
</body>
</html>
