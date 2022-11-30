@extends('layout')
    
@section('tittle', 'Permisos')

@section('content')
    <div class="min-h-screen py-12">
        <h1 class="text-2xl font-bold text-center">FORMATO DE SOLICITUD Y AUTORIZACIÓN DE PERMISOS</h1><br>
        <div class="container mx-auto">    
            <div class=" flex flex-col lg:flex-row lg:w-10/12 mx-auto bg-white rounded-xl drop-shadow-xl overflow-hidden">
                <div class="w-2/3 flex flex-col text-white items-center justify-center bg-no-repeat bg-cover bg-center" style="background-image: url('images/prueba.jpg');">
                    <h1 class="text-3xl">Bienvenido</h1>
                    <h1 class="text-3xl text-center py-7">Corporación Venezolana de Guayana</h1>
                    <div>
                        <p class="mx-5">Esta la mejor deberian ir a la luna para poder resolver todos los problemas de vez en cuando se pelea y a veces no hay que intentar se lo mejor de lo mejor aunqeu no sepamos mucho de un tema esforzarce siempre</p>
                    </div>
                </div>
                <form  method="POST" action="EnvioDatos" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <div class="w-full px-10 pt-10 pb-6">
                            <fieldset>
                                <legend>
                                    <h2 class="font-bold">POR FAVOR</h2>
                                    <h2 class="font-bold">Complete el formulario y haga click en el Boton de Imprimir</h2><br>    
                                </legend>
                            </fieldset>
                            <div class="shadow-md form-group">
                                <label class="font-semibold" for="idFechaS">Fecha de la Solicitud:</label>
                                <input type="date" required class="border border-gray-400 py-1 px-2 w-full"name="fecha_solicitud" id="idFechaS"/>
                            </div><br>
                                    <h3 class="text-center font-semibold">DATOS DEL SOLICITANTE</h3>
                                    <div class="shadow-md form-group">
                                        <div class="grid grid-cols-2 gap-3">
                                            <div class="px-2 py-2">
                                                <label for="idcedula">Cédula de Identidad:</label><br>
                                                <input type="number" required placeholder="Cedula" class="border border-gray-400 py-1 px-2 w-4/5" name="cedula" id="idcedula" onblur="buscar_datos();"/>
                                                <input type="text" required placeholder="Nombre" class="border border-gray-400 py-1 px-2 w-4/5 my-5" name="nombre" id="idnombre"/>
                                            </div>
                                            <div class="px-2 py-2">
                                                <label for="idubicacionG">Ubicación Geográfica:</label><br>
                                                <input type="text" required placeholder="Ubicación" class="border border-gray-400 py-1 px-2 w-4/5" name="ubicacion" id="idubicacionG"/>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 gap-3" >
                                            <div class="px-2 py-2"> 
                                                <label for="idnomina">Nómina:</label><br>
                                                <input type="number" required placeholder="Nomina" class=" border border-gray-400 py-1 px-2 w-4/5" name="nomina" id="idnomina"/>                <br>
                                            </div>
                                            <div class="px-2 py-2">
                                                <labe for="idvicepresidencia">Vicepresidencia o Gerencia General:</labe>
                                                <input type="text" required placeholder="Vicepresicencia" class="border border-gray-400 py-1 px-2 w-4/5" name="vicepresidencia" id="idvicepresidencia"/>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 gap-3" >
                                            <div class="px-2 py-2">
                                                <label for="idgerencia">Gerencia:</label><br>
                                                <input type="text" required placeholder="Gerencia" class="border border-gray-400 py-1 px-2 w-4/5" name="gerencia" id="idgerencia"/>
                                            </div>
                                            <div class="px-2 py-2">
                                                <label for="iddepartamento">Departamento:</label><br>
                                                <input type="text" required placeholder="Departamento" class="border border-gray-400 py-1 px-2 w-4/5" name="departamento" id="iddepartamento"/>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 gap-3" >
                                            <div class="px-2 py-2">
                                                <label for="idmotivo">Motivo:</label><br>
                                                <textarea class="border border-gray-400 py-1 px-2 w-4/5" required rows="3" name="motivo" id="idmotivo"></textarea>
                                            </div>
                                            <div class="px-2 py-2">
                                                <label for="idsupervisor">Nombre del Supervisor Inmediato</label>
                                                <input type="text" required placeholder="supervisor" class="border border-gray-400 py-1 px-2 w-4/5" name="supervisor" id="idsupervisor"/>
                                            </div>
                                        </div>
                                    </div><br>
                                    <h3 class="text-center font-semibold">DURACIÓN DEL PERMISO</h3>
                                    <div class="grid grid-cols-2 gap-3 shadow-md form-group" >
                                        <div class="px-2 py-2">
                                            <label for="idfechaI">Desde:</label><br>
                                            <input type="date" required class="border border-gray-400 py-1 px-2 w-4/5" name="tiempo_inicio" id="idfechaI"/><br>
                                            <label for="idfechaF">Hasta:</label><br>
                                            <input type="date" required class="border border-gray-400 py-1 px-2 w-4/5" name="tiempo_fin" id="idfechaF"/>
                                        </div>
                                        <div class="px-2 py-2">
                                            <label for="idtotalD">Total Días:</label><br>
                                            <input type="number" required placeholder="Nro Días" class="border border-gray-400 py-1 px-2 w-4/5" name="total_dias" id="idtotalD"/>
                                            <br><label for="idtotalH">Total Horas</label><br>
                                            <input type="number" required placeholder="Nro Horas" class="border border-gray-400 py-1 px-2 w-4/5" name="total_horas" id="idtotalH"/>
                                        </div>
                                        <h3 class="text-center font-semibold">Complemento</h3><br>
                                        <div class="shadow-md form-group" >
                                            <input type="file" required placeholder="Documento" class="border border-gray-400 py-1 px-2 w-full" name="pdf" id="idtotalH"/>
                                        </div>
                                    </div>
                            </div>
                    </div>
                        <div class="text-center font-semibold mb-6">
                            <input type="submit" value="ALMACENAR" class="w-1/4 bg-violet-200 py-1 hover:bg-gray-400 active:bg-gray-500 rounded-full""/>
                            <input type="reset" value="LIMPIAR" class="w-1/4 bg-violet-200 py-1  hover:bg-gray-400 active:bg-gray-500 rounded-full"/>
                            <input type ="button" class="w-1/3 bg-violet-200 py-1  hover:bg-gray-400 active:bg-gray-500 rounded-full" value ="VOLVER A LA INTRANET"/>
                            <input type ="button" class="w-1/3 bg-violet-200 py-1  hover:bg-gray-400 active:bg-gray-500 rounded-full" onclick="window.print();" value ="IMPRIMIR"/>
                        </div>
                </form>
            </div>
        </div>
    </div> 
@endsection