package org.lacourarie.vuln.xxe;

import lombok.extern.java.Log;
import lombok.extern.slf4j.Slf4j;
import org.springframework.web.bind.annotation.*;

import javax.xml.bind.JAXBContext;
import javax.xml.bind.JAXBException;
import javax.xml.bind.Unmarshaller;
import javax.xml.stream.XMLInputFactory;
import javax.xml.stream.XMLStreamException;
import javax.xml.stream.XMLStreamReader;
import java.io.StringReader;
import java.io.UnsupportedEncodingException;
import java.net.URLDecoder;

import static org.springframework.http.MediaType.ALL_VALUE;

@Slf4j
@RestController
public class XxeController {

    @GetMapping
    public String index() {
        return "make a post with xml message (<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\"?><message><text>coucou</text></message>)";
    }

    @PostMapping(value = "/")
    public Message parse(@RequestParam String xml) throws JAXBException, XMLStreamException {
        log.info("$$" + xml + "$$");
        JAXBContext jc = JAXBContext.newInstance(Message.class);
        XMLInputFactory xif = XMLInputFactory.newFactory();

//        xif.setProperty(XMLInputFactory.IS_SUPPORTING_EXTERNAL_ENTITIES, true);
//        xif.setProperty(XMLInputFactory.IS_VALIDATING, false);
//        xif.setProperty(XMLInputFactory.SUPPORT_DTD, true);

        XMLStreamReader xsr = xif.createXMLStreamReader(new StringReader(xml));

        Unmarshaller unmarshaller = jc.createUnmarshaller();
        return (Message) unmarshaller.unmarshal(xsr);
    }

    @PostMapping(value = "/", consumes = "text/xml")
    public Message parse(@RequestBody Message xml) throws JAXBException, XMLStreamException {
        log.info("$$" + xml + "$$");
        return xml;
    }

}
