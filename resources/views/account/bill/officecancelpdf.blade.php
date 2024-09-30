<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns=http://www.w3.org/1999/xhtml xml:lang=en lang=en>
<meta charset=utf-8>
<title>Online Receipt</title>
<meta name=author content=ITS-SATYAJIT>
<meta name=keywords content=DAE4xuvHwA4,BACbJH5Jo_0>
<script src="https://cdn.tailwindcss.com"></script>

<meta http-equiv="content-security-policy"
  content="default-src 'none'; font-src 'self' data:; img-src 'self' data:; style-src 'unsafe-inline'; media-src 'self' data:; script-src 'unsafe-inline' data:; object-src 'self' data:; frame-src 'self' data:;">
<style>
  img[src="data:,"],
  source[src="data:,"] {
    display: none !important
  }
</style>
</head>
<div class="text-9xl uppercase font-black absolute container top-[400px]   justify-center w-full opacity-25 flex  ">
  <div class="w-full -rotate-45" style="color: rgba(170, 0, 0, 0.644)">Canceled</div>
</div>

<body class="container justify-center p-10">

  <div style=text-indent:0pt;text-align:left>
    <div class=flex>
      <img width="219" height="112" alt="image" src="{{ asset('account/Image_001.png') }}">
      <div class="mx-auto text-center">
        <h1 class="text-3xl font-bold">TAX INVOICE CUM PAYMENT RECEIPT</h1>
        <h2 class="font-bold">OFFICE COPY</h2>
        <p class="s1">GSTIN NO.: {{ $bill->gst_number }}</p>
      </div>
    </div>
  </div>
  <p style=text-indent:0pt;text-align:left>
    <br>
  </p>
  <p style=text-indent:0pt;text-align:left>
    <br>
  </p>
  <p class="s2" style="padding-left" :2pt text-indent:0pt line-height:2pt text-align:left></p>
  <div class="flex justify-between border-t-4 border-t border-b-4 border-b">
    <div>RECEIPT DATE : {{ date('d-m-Y', strtotime($bill->receipt_date)) }}</div>
    <div class="mr-20">RECEIPT NUMBER : SD/SC/{{ $bill_id }}</div>
  </div>
  <table class="w-full table-auto">
    <thead class="w-full">
      <tr>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="px-3">School</td>
        <td class="px-3">:</td>
        <td class="px-3">{{ $bill->school->name }}</td>
      </tr>
      <tr>
        <td class="px-3">Location</td>
        <td class="px-3">:</td>
        <td class="px-3">{{ $bill->location }}</td>
      </tr>
      <tr>
        <td class="px-3">Mobile No.</td>
        <td class="px-3">:</td>
        <td class="px-3">{{ $bill->mobile }}</td>
      </tr>
      <tr>
        <td class="px-3">Email ID</td>
        <td class="px-3">:</td>
        <td class="px-3">{{ $bill->email_id }}</td>
      </tr>
    </tbody>
  </table>
  <p>
    <br>
  </p>
  <table class=w-full>
    <tbody>
      <tr>
        <td class="border-2 border">
          <p>Sl. No.</p>
        </td>
        <td class=border>
          <p>Product Head Name</p>
        </td>
        <td class="border-2 border">
          <p>Fee Amount</p>
        </td>
        <td class="border-2 border">
          <p>CGST</p>
        </td>
        <td class="border-2 border">
          <p>SGST</p>
        </td>
        <td class="border-2 border">
          <p>
            Amount
          </p>
        </td>
      </tr>
      <tr style="height:150pt">
        <td class="border-2 border">
          <p>1
          </p>
        </td>
        <td class="border-2 border">
          <p>
            <span>SCHOOL DEKHO 1 YEAR
              <br>
              SUBSCRIPTION</span>
          </p>
          <p class="s4">
            SAC : 9983
          </p>
        </td>
        <td class="border-2 border">
          <p class="s4">
            Rs. {{ $bill->received_amount }}/-
          </p>
        </td>
        <td class="border-2 border">
          <p>
            Rs. {{ $bill->cgst }}/-
          </p>
        </td>
        <td class="border-2 border">
          <p class="s4">
            Rs. {{ $bill->sgst }}/-
          </p>
        </td>
        <td class="border-2 border">
          <p class="s4">
            Rs. {{ $bill->total }}/-
          </p>
        </td>
      </tr>
  </table>
  <div class="grid right-2 justify-end w-auto">
    <div>
      Total Received : Rs. {{ $bill->total }}/-
    </div>
    <div>
      Due Amount : @if ($bill->due_amount == '0.00')
        No Due
      @else
        Rs. {{ $bill->due_amount }}/-
      @endif
    </div>
    {{-- <div>
            Due: Rs. {{ $bill->total }}/-
    </div> --}}
  </div>
  <div class="grid left-2 justify-start w-auto">
    <div>
      Mode of Payment: {{ $bill->payment_mode }}
    </div>
    @if ($bill->payment_mode == 'Online')
      <div>
        Transaction ID: {{ $bill->transaction_id }}
      </div>
    @endif
    @if ($bill->payment_mode == 'cheque')
      <div>
        Bank Name: {{ $bill->bank_name }}
      </div>
      <div>
        Cheque Number:{{ $bill->cheque_number }}
      </div>
    @endif
  </div>
  <div class="flex border-t-4">
    <div class="right-2 mt-5 mr-2 ml-auto">
      RECEIVED WITH THANKS
    </div>
  </div>
