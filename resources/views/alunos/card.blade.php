 <div class="row">
     <div class="col">
         <div class="card p-4">
             <div class="row">
                 <div class="col">
                     <h4 class="text-info">{{ $aluno->name }}</h4>
                    <small class="text-secondary">
 Criado em: {{ $aluno->created_at->format('d/m/Y H:i') }}
</small>
@if ($aluno->created_at != $aluno->updated_at)
 <small class="text-secondary ms-5">
 Atualizado em: {{ $aluno->updated_at->format('d/m/Y H:i') }}
 </small>
@endif

                 </div>
                 <div class="col text-end">
                     <a href="{{ route('alunos.edit', ['id' => Crypt::encrypt($aluno->id)]) }}" class="btn btnoutline-secondary btn-sm mx-1"><I class="fa-regular fa-pen-to-square">EDITAR</i></a>
                     <a href="{{ route('alunos.destroy', ['id' => Crypt::encrypt($aluno->id)]) }}" class="btn
btn-outline-danger btn-sm mx-1">DELETAR<i class="fa-regular fa-trash-can"></i></a>
                 </div>
             </div>
             <hr>
             <p class="text-secondary">{{$aluno->email}}</p>
         </div>
     </div>
 </div>