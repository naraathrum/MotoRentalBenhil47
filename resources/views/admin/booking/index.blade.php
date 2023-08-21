<x-app-layout>
  <x-slot name="title">Admin</x-slot>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-black">
      {{ __('Booking') }}
    </h2>
  </x-slot>

  <x-slot name="script">
    <script>
      // AJAX DataTable
      var datatable = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        stateSave: true,
        ajax: {
          url: '{!! url()->current() !!}',
        },
        language: {
          url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/id.json'
        },
        columns: [{
            data: 'id',
            name: 'id',
          },
          {
            data: 'user.name',
            name: 'user.name'
          },
          {
            data: 'item.brand.name',
            name: 'item.brand.name'
          },
          {
            data: 'item.name',
            name: 'item.name'
          },
          {
            data: 'start_date',
            name: 'start_date'
          },
          {
            data: 'end_date',
            name: 'end_date'
          },
          {
            data: 'status_motor',
            name: 'status_motor'
          },
          {
            data: 'payment_status',
            name: 'payment_status'
          },
          {
            data: 'total_price',
            name: 'total_price'
          },
          {
            data: 'denda',
            name: 'denda',
            render: function(data, type, row) {
              if (data === null || data === undefined) {
                return 'Belum ada denda';
              } else {
                return data;
              }
            }
          },
          {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false,
            width: '15%'
          },
        ],
      });
    </script>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden shadow sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
          <table id="dataTable">
            <thead>
              <tr>
                <th style="max-width: 1%">ID</th>
                <th>User</th>
                <th>Brand</th>
                <th>Item</th>
                <th>Mulai</th>
                <th>Selesai</th>
                <th>Status Motor</th>
                <th>Status Pembayaran</th>
                <th>Total Dibayar</th>
                <th>Denda</th>
                <th style="max-width: 1%">Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
