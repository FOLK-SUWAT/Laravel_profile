@extends('contact.layout')

@section('content')

<div class="bg-white shadow overflow-hidden sm:rounded-lg mt-10">
    <a class="btn btn-primary pull-right" href="{{ route('contact.index') }}"> Back</a>
    <div class="px-4 py-5 sm:px-6">
      <h3 class="text-lg leading-6 font-medium text-gray-900">Name : {{ $contact->name }}</h3>
      <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal Contact details.</p>

    </div>

    <div class="border-t border-gray-200">
      <dl>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Email</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ $contact->email }}</dd>
          </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">company</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ $contact->company }}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">detail</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ $contact->detail }}</dd>
        </div>


      </dl>
    </div>
  </div>

@endsection
