<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Room Booking - Peit Them Resort</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
  <div class="container mx-auto max-w-md py-10">
    <h1 class="text-3xl font-bold text-center mb-4">Peit Them Resort - Booking Request!</h1>
    <p class="text-gray-600 text-center mb-8">Thank you for booking with us. Here are the details of your reservation:</p>

    <table class="w-full table-auto shadow-md rounded-lg">
      <thead>
        <tr class="bg-gray-200 text-left text-sm font-medium">
          <th class="px-4 py-2">Details</th>
          <th class="px-4 py-2">Information</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-b border-gray-300 hover:bg-gray-100">
          <td class="px-4 py-2">Name</td>
          <td class="px-4 py-2">{{$data['name']}}</td> </tr>
          <tr class="border-b border-gray-300 hover:bg-gray-100">
          <td class="px-4 py-2">Email</td>
          <td class="px-4 py-2">{{$data['email']}}</td> </tr>
          <tr class="border-b border-gray-300 hover:bg-gray-100">
          <td class="px-4 py-2">Mobile</td>
          <td class="px-4 py-2">{{$data['mobile']}}</td> </tr>
        <tr class="border-b border-gray-300 hover:bg-gray-100">
          <td class="px-4 py-2">Arrival Date</td>
          <td class="px-4 py-2">{{$data['checkin']}}</td> </tr>
        <tr class="border-b border-gray-300 hover:bg-gray-100">
          <td class="px-4 py-2">Departure Date</td>
          <td class="px-4 py-2">{{$data['checkout']}}</td> </tr>
        <tr class="border-b border-gray-300 hover:bg-gray-100">
          <td class="px-4 py-2">Room Type</td>
          <td class="px-4 py-2">{{$data['room']}}</td> </tr>
        <tr class="border-b border-gray-300 hover:bg-gray-100">
          <td class="px-4 py-2">Number of Rooms</td>
          <td class="px-4 py-2">{{$data['roomcount']}}</td> </tr>
      </tbody>
    </table>

    <div class="text-center mt-8">
      <p class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-700">
        We have received your booking details and will confirm your reservation shortly.
</p>
    </div>
  </div>
</body>
</html>
