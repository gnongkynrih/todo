<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Booking - Yalana</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
  <div class="container mx-auto max-w-md py-10">
    <h1 class="text-3xl font-bold text-center mb-4">Your Hotel Booking Confirmed!</h1>
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
          <td class="px-4 py-2">Hotel Name</td>
          <td class="px-4 py-2">**[Hotel Name Here]**</td> </tr>
        <tr class="border-b border-gray-300 hover:bg-gray-100">
          <td class="px-4 py-2">Arrival Date</td>
          <td class="px-4 py-2">**[Arrival Date Here]**</td> </tr>
        <tr class="border-b border-gray-300 hover:bg-gray-100">
          <td class="px-4 py-2">Departure Date</td>
          <td class="px-4 py-2">**[Departure Date Here]**</td> </tr>
        <tr class="border-b border-gray-300 hover:bg-gray-100">
          <td class="px-4 py-2">Number of Guests</td>
          <td class="px-4 py-2">**[Number of Guests Here]**</td> </tr>
      </tbody>
    </table>

    <div class="text-center mt-8">
      <a href="#" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-700">View Booking Details</a>
    </div>
  </div>
</body>
</html>
