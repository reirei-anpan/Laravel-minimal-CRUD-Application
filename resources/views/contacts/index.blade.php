<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          お問い合わせ一覧
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                  <a href="{{ route('contacts.create')}}" class="text-blue-500 underline">新規登録</a>
                  <div class="lg:w-2/3 w-full mx-auto overflow-auto mt-10">
                    <table class="table-auto w-full text-left whitespace-no-wrap">
                      <thead>
                        <tr>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Id</th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">氏名</th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">件名</th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">作成日</th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">詳細</th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">削除</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($contacts as $contact)
                          <tr>
                            <td class="border-t-2 border-gray-200 px-4 py-3">{{ $contact->id }}</td>
                            <td class="border-t-2 border-gray-200 px-4 py-3">{{ $contact->name }}</td>
                            <td class="border-t-2 border-gray-200 px-4 py-3">{{ $contact->title}}</td>
                            <td class="border-t-2 border-gray-200 px-4 py-3">{{ $contact->created_at}}</td>
                            <td class="border-t-2 border-gray-200 px-4 py-3"><a href="{{ route('contacts.show', ['id' => $contact->id])}}" class="text-blue-500 underline">詳細</a></td>
                            <td class="border-t-2 border-gray-200 px-4 py-3">
                              <form method="POST" action="{{ route('contacts.destroy',  ['id' => $contact->id]) }}">
                                @csrf
                                <button class="text-red-500 underline">削除</button>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  {{ $contacts->links() }}
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
