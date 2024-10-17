<div class="container mx-auto mt-8">
    <h1 class="text-center text-2xl font-bold mb-4">Videollamada</h1>
    <div class="flex justify-center">
        <video id="localVideo" autoplay playsinline class="border-2 border-gray-300 rounded-lg"></video>
        <video id="remoteVideo" autoplay playsinline class="ml-4 border-2 border-gray-300 rounded-lg"></video>
    </div>
    <div class="mt-4 text-center">
        <button id="startCall" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Iniciar llamada</button>
    </div>
</div>

<script>
    const localVideo = document.getElementById('localVideo');
    const remoteVideo = document.getElementById('remoteVideo');
    let localStream;
    let peerConnection;

    // Configura las STUN servers
    const config = {
        iceServers: [
            { urls: 'stun:stun.l.google.com:19302' }
        ]
    };

    // Obtén acceso a la cámara del usuario
    navigator.mediaDevices.getUserMedia({ video: true, audio: true }).then(stream => {
        localVideo.srcObject = stream;
        localStream = stream;
    });

    document.getElementById('startCall').addEventListener('click', () => {
        peerConnection = new RTCPeerConnection(config);
        
        localStream.getTracks().forEach(track => peerConnection.addTrack(track, localStream));

        peerConnection.ontrack = event => {
            remoteVideo.srcObject = event.streams[0];
        };

        peerConnection.onicecandidate = event => {
            if (event.candidate) {
                // Envía el candidato ICE a través de tu servidor Laravel
            }
        };

        peerConnection.createOffer().then(offer => {
            return peerConnection.setLocalDescription(offer);
        }).then(() => {
            // Envía la oferta al servidor Laravel
        });
    });
</script>
