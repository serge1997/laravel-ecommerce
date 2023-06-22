<div class="w-full">
    <table class="border-collapse border slate-400 w-full">
        <thead>
            <tr>
                <th class="w-100 border border-slate-400 p-2 text-slate-600 uppercase font-normal">imagem</th>
                <th class="border border-slate-400 p-2 text-slate-600 uppercase font-normal">nome</th>
                <th class="border border-slate-400 p-2 text-slate-600 uppercase font-normal">quantidade</th>
                <th class="border border-slate-400 p-2 text-slate-600 uppercase font-normal">data</th>
            </tr>
        </thead>

        @foreach ($ItensList as $item)
            <tbody>
                <tr>
                    <td>
                        <img class="flex w-16" src="/img/produtos/{{ $item->foto }}" alt="">
                    </td>
                    <td>{{ $item->nome }}</td>
                    <td class="text-center">{{ $item->quantidate }}</td>
                    <td>{{ date('d/m/Y', strtotime($item->emissao))}}</td>
                </tr>
            </tbody>
        @endforeach
    </table>
</div>