function SSE(url, options = {}) {
    const eventSource = new EventSource(url);
  
    // Asignar los eventos especificados
    for (const [eventName, eventHandler] of Object.entries(options.events || {})) {
      eventSource.addEventListener(eventName, eventHandler);
    }
  
    // Suscribirse a eventos personalizados
    function subscribe(eventName, eventHandler) {
      eventSource.addEventListener(eventName, eventHandler);
    }
  
    // Cancelar la suscripción a eventos personalizados
    function unsubscribe(eventName, eventHandler) {
      eventSource.removeEventListener(eventName, eventHandler);
    }
  
    // Cerrar la conexión SSE
    function close() {
      eventSource.close();
    }
  
    // Retornar los métodos públicos
    return {
      subscribe,
      unsubscribe,
      close,
    };
  }
  